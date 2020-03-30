<?php

namespace App\DataTables;

use App\StudentAffairs\Admin;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class AdminsDataTable extends DataTable
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
            ->addColumn('action', 'studentAffairs.admin.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Admin $model)
    {
        return $model->newQuery();
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
        ->addTableClass('table table-bordered table-striped ')
        ->parameters([
            'dom'          => 'Bfrtip',
            "lengthMenu"=> [[10, 25, 50, -1], [10, 25, 50, "All"]],

            'buttons'      =>[
                ['text' => 'create', 'className' => 'btn btn-success', 'text' => __('lang.create')],
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
        return [
            [
                'name' => 'id',
                'data' => 'id',
                'title' => 'Id',
                'width' => 10,
                
            ],    [
                'name' => 'name_'.app()->getLocale(),
                'data' => 'name_'.app()->getLocale(),
                'title' => __('lang.name')
            ],    [
                'name' => 'email',
                'data' => 'email',
                'title' => __('lang.email')
            ],    [
                'name' => 'action',
                'data' => 'action',
                'title' => __('lang.actions'),
                'width' => 70,
                'exportable' => false,
                'orderable' => false,
                'searchable' => false,
                'printable' => false
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
