<?php
namespace App\Http\Controllers\Dashboard\Datatables;

use App\Datatables\BaseDatatables;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserDatatables extends BaseDatatables
{
    public function query()
    {
        return User::all();
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
                        <input type="checkbox" name="id[]" value="'.$value->id.'">
                        </div>'
                    ;})
            ->addColumn('id', function ($value){
                return  $value->id;
            })
            ->addColumn('email', function ($value){
                return  $value->email;
            })
            ->addColumn('action', function ($value) {
                    return '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li><a class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <a class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>'
                        ;})
            ->rawColumns(['id', 'checkbox','action'])->make(true);
    }

}
