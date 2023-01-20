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
            ->addColumn('status', function ($value){
                return $value->status;
            })
            ->addColumn('action', function ($value) {
                switch ($value->status){
                    case Playlist::PLAYLIST_STATUS_PENDING:
                        return '<a href="'.route('dashboard.make.playlist',['id' => $value->id]).'" class="btn btn-primary">GET LINK</a>';
                        break;
                    case Playlist::PLAYLIST_STATUS_COMPLETED:
                        return 'http://45.76.204.156:88/hls/upload/'.
                            $value->user_id.'/'.$value->broadcast_date.'/'.$value->type.'/'.$value->type.'.m3u8';
                        break;
                    default:
                        return '<button class="btn btn-primary">Processing</button>';
                }
                    ;})
            ->rawColumns(['id', 'checkbox','action', 'ready'])->make(true);
    }

}
