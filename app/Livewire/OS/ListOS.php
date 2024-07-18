<?php

namespace App\Livewire\OS;

use App\Models\OS;
use Livewire\Component;
use Livewire\WithPagination;

class ListOS extends Component
{
    use WithPagination;

    public $config;
    public $header;
    public $dados;
    public $search;
    public $contato;
    public $data;
    public $idDelete = null;

    public function render()
    {
        $this->dados = OS::where('status', 0)
            ->when($this->search, function ($query) {
                $query->whereHas('client', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->contato, function ($query) {
                $query->whereHas('contact', function ($query) {
                    $query->where('name', 'like', '%' . $this->contato . '%');
                });
            })
            ->when($this->data, fn ($query) => $query->whereDate('created_at', $this->data))
            ->orderBy('id', 'desc')
            ->get();

        return view('livewire.o-s.list-o-s');
    }

    public function deleteModal($id)
    {
        $this->idDelete = $id;
        $this->dispatch('modal-delete');
    }

    public function delete()
    {
        $os = OS::find($this->idDelete);
        $os->delete();
        $this->idDelete = null;
    }
}
