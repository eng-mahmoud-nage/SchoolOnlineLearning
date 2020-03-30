<?php

namespace App\DataTables;

use App\StudentAffairs\Classs;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class ClassDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', 'studentAffairs.class.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Classs $model)
    {
        return $model->newQuery()->select('stages.name_'.app()->getLocale().' as stage_name',
        'levels.name_'.app()->getLocale().' as level_name',
        'classes.name_'.app()->getLocale().' as class_name',
        'classes.id as id')
        ->join('levels', 'classes.level_id', '=', 'levels.id')
        ->join('stages', 'levels.stage_id', '=', 'stages.id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->columns($this->getColumns())
        ->setTableId('data-table')
        ->minifiedAjax()
        ->addTableClass('table table-bordered table-striped')
        ->parameters([
            'dom'          => 'Bfrtip',
            "lengthMenu"=> [[10, 25, 50, -1], [10, 25, 50, "All"]],

            'buttons'      =>[
                ['extend' => 'create', 'className' => 'btn btn-success', 'text' => __('lang.create')],
                ['extend' => 'print', 'className' => 'btn btn-info', 'text' => __('lang.print')],
                ['extend' => 'excel', 'className' => 'btn btn-warning', 'text' => __('lang.excel')],
                ['extend' => 'pdf', 'className' => 'btn btn-danger', 'text' => __('lang.pdf')],
            ], 
            'initComplete' => "function () {
                this.api().columns([1,2]).every(function () {
                    var column = this;
                    var input = document.createElement(\"input\");
                    input.className = \"f_search\";
                    $(input).appendTo($(column.footer()).empty())
                    .on('keyup', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            }",
        ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        // $record = Classs::find($id);

        return [
            [
                'defaultContent' => '',
                'data'           => 'DT_RowIndex',
                'name'           => 'DT_RowIndex',
                'title'          => '#',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '',
                'width' => 10
            ],     [
                'name' => 'classes.name_'.app()->getLocale(),
                'data' => 'class_name',
                'title' => __('lang.level')
            ],  [
                'name' => 'levels.name_'.app()->getLocale(),
                'data' => 'level_name',
                'title' => __('lang.level')
            ],     [
                'name' => 'stages.name_'.app()->getLocale(),
                'data' => 'stage_name',
                'title' => __('lang.stage')
            ],    [
                'name' => 'action',
                'data' => 'action',
                'title' => __('lang.actions'),
                'exportable' => false,
                'orderable' => false,
                'searchable' => false,
                'printable' => false,
                'width' => 50
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admins_' . date('YmdHis');
    }
}
