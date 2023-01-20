<?php
namespace App\Http\Controllers\Dashboard\Datatables;

use App\Datatables\BaseDatatables;
use App\Models\Audio;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class AudioDatatables extends BaseDatatables
{
    public function query()
    {
        return Audio::all();
    }

    public function  datatables(){
        return DataTables::of($this->query())
            ->filter(function ($query){
                if (request()->has('email')) {
                    $query->where('email', 'like', "%" . request('email') . "%");
                }
            })
            ->addColumn('checkbox', function ($value) {
                return '<div class="custom-control custom-checkbox text-center">
                        <input type="checkbox" name="id[]" value="'.$value->id.'" class="dataTable-checkbox">
                        </div>'
                    ;})
            ->addColumn('id', function ($value){
                return  $value->id;
            })
            ->addColumn('name', function ($value){
                return  $value->name;
            })
            ->addColumn('broadcast_date', function ($value){
                return  $value->broadcast_date;
            })
            ->addColumn('type', function ($value){
                return  $value->type;
            })
            ->addColumn('action', function ($value) {
                return '<a href="'.route('dashboard.audio.delete', [ 'id' => $value->id]).'">Delete</a>'
                    ;})
            ->rawColumns(['id', 'checkbox','action'])->make(true);
    }

}
