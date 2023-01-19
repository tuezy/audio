<?php
namespace App\Datatables;

use App\Datatables\Contracts\IDatatables;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

abstract class BaseDatatểdables implements IDatatables{
    protected $addActionsColumn = false;

    protected $htmlBuilder;

    protected $html;

    public function dataTable(User $model): EloquentDataTable
    {
        return (new EloquentDataTable($model->newQuery()))->setRowId('id');
    }

    public function render($view, $data = [])
    {
        $this->htmlBuilder  = DataTables::getHtmlBuilder();

        if (request()->ajax()) {
            return DataTables::of($this->query())->toJson();
        }

        $this->html = $this->htmlBuilder->columns(
            array_merge(
                $this->columns(),
                $this->addActions(),
            ));
        return view($view, array_merge([
            'datatables' => $this->html
        ], $data));
    }

    protected function addActions(){
        if($this->addActionsColumn == false) return [];
        return [
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'Action',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '',
            ]
        ];
    }
}
