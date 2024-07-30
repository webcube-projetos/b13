<?php

namespace App\Http\Controllers;

use App\Livewire\OrcamentoPdf;
use App\Models\FakeModel;
use App\Models\OS;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;
use Livewire\Livewire;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Log;

class OrcamentosController extends Controller
{
    protected $prefix;
    protected $request;

    use MontarPagina;
    use MontarForm;

    public function __construct(Request $request)
    {
        $this->prefix = 'orcamento';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;

        [$config, $header] = $this->montarPagina('orcamento');
        $config = $config->toArray();
        $header = $header->toArray();

        return view('listagem', compact('prefix', 'config', 'header'));
    }

    public function cadastro()
    {
        $dados = $this->montarForm('orcamentos')->toArray();
        $id = null;

        return view('orcamento', compact('dados', 'id'));
    }

    public function editar()
    {
        $id = $this->request->id;
        $dados = $this->montarForm('orcamentos')->toArray();

        return view('orcamento', compact('dados', 'id'));
    }

    public function exportPdf($osId)
    {
        try {
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('chroot', base_path());
            $options->set('isHtml5ParserEnabled', true);
            $options->set('dpi', 120);

            $dompdf = new Dompdf($options);
            $dompdf->setPaper('A3', 'landscape'); 

            $os = OS::find($osId);
    
            if (!$os) {
                return abort(404); // Orçamento não encontrado
            }
    
            // Renderiza o componente Livewire
            $component = app(OrcamentoPdf::class, ['osId' => $osId]);
            $component->os = $os; 
            $html = $component->render()->render(); // Renderiza a view do componente
    
            $dompdf->loadHtml($html);
            $dompdf->render();
    
            return $dompdf->stream('orcamento_' . $osId . '.pdf');
        } catch (\Throwable $e) {
            Log::error('Erro ao gerar PDF: ' . $e->getMessage());
            abort(500, 'Ocorreu um erro ao gerar o PDF.');
        }
    }
}
