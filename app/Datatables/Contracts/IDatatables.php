<?php
namespace App\Datatables\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface IDatatables{
    public function getModel();

    public function columns(): array;

    public function query():Builder;

    public function render($view, $data = []);
}
