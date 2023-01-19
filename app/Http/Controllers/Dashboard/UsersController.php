<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\Datatables\UserDatatables;
use App\Http\Requests\Dashboard\SettingsRequest;
use App\Models\User;
use App\Repository\SettingRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends BaseDashboardController
{

    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    public function index(Request $request, UserDatatables $dataTable)
    {
        return $dataTable->render('dashboard::pages.users.index', [
            'pageTitle' => "Users",
        ]);
    }

    public function datatables(Request $request){
        return DataTables::of(User::query())->make(true);
    }

    public function update(Request $request){
    }

    public function delete($id){
        $user = $this->userRepository->findOrFail($id);

        if ($user->delete()) {
            session()->flash('success', trans('dashboard.delete-success'));
            return response()->json(['message' => true], 200);
        } else {
            session()->flash('success', trans('dashboard.delete-fail'));

            return response()->json(['message' => false], 200);
        }

    }
}
