<?php
namespace App\Datatables;

use App\Datatables\Contracts\IDatatables;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

abstract class BaseDatatables{
    public abstract function  datatables();
    public function render($view, $data = []){
        if (request()->ajax()) {
            return $this->datatables();
        }
        return view($view, $data);
    }
}
