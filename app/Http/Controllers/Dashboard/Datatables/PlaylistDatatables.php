<?php
namespace App\Http\Controllers\Dashboard\Datatables;

use App\Datatables\BaseDatatables;
use App\Models\Audio;
use App\Models\Playlist;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class PlaylistDatatables extends BaseDatatables
{
    public function query()
    {
        return Playlist::query()->orderBy('updated_at');
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
            ->addColumn('broadcast_date', function ($value){
                return  $value->broadcast_date;
            })
            ->addColumn('type', function ($value){
                return  $value->type;
            })
            ->addColumn('ready', function ($value){
                return '<span class="btn btn-sm btn-'.($value->ready == 'pending' ? 'danger':'success').'">'.$value->ready.'</span>';
            })
            ->addColumn('action', function ($value) {
                switch ($value->ready){
                    case 'pending':
                        return '<button class="btn btn-primary">Stream</button>';
                        break;
                    case 'completed':
                        return '<button class="btn btn-primary">On Ready</button>';
                        break;
                    default:
                        return '<button class="btn btn-primary">Processing</button>';
                }
                    ;})
            ->rawColumns(['id', 'checkbox','action', 'ready'])->make(true);
    }

}
