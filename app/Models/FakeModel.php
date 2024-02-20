<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class FakeModel extends Model
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function paginate($perPage)
    {
        $currentPage = request()->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $items = array_slice($this->data, $offset, $perPage);

        return new LengthAwarePaginator(
            $items,
            count($this->data),
            $perPage,
            $currentPage
        );
    }

    public function first()
    {
        return $this->data[0];
    }
}
