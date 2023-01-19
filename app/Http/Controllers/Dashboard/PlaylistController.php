<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\Datatables\PlaylistDatatables;
use App\Http\Controllers\Dashboard\Datatables\UserDatatables;
use App\Http\Requests\Dashboard\SettingsRequest;
use App\Models\User;
use App\Repository\SettingRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PlaylistController extends BaseDashboardController
{

    protected $playlistDatatables;

    public function __construct()
    {
        parent::__construct();
    }

    public function index(PlaylistDatatables $dataTable){
        return $dataTable->render("dashboard::pages.playlist.index");
    }

    public function delete(){
        Storage::deleteDirectory();
    }
}
