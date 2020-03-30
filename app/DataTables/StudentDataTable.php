<?php

namespace App\DataTables;

use App\StudentAffairs\Stage;
use App\StudentAffairs\Student;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StudentDataTable extends DataTable
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
            ->addColumn('action', 'studentAffairs.student.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Student $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Student $model)
    {
        // dd($model->id);

        $role = auth()->guard('admin')->user()->roles?auth()->guard('admin')->user()->roles->where('model_id','>','0')->pluck('model_id')->toArray():'';
        
        if($role){
            $tablename = auth()->guard('admin')->user()->roles->where('model_id','>','0')->pluck('table_name')->toArray();
            
            // dd($tablename);
            return $model->newQuery()->select('stages.name_'.app()->getLocale().' as stage_name',
            'levels.name_'.app()->getLocale().' as level_name',
            'classes.name_'.app()->getLocale().' as class_name',
            'students.name_'.app()->getLocale().' as std_name',
            'students.student_code as std_code', 
            'students.id as id')
            ->join('level_student', 'level_student.student_id', '=', 'students.id')
            ->join('stages', 'level_student.stage_id', '=', 'stages.id')
            ->join('levels', 'level_student.level_id', '=', 'levels.id')
            ->join('classes', 'level_student.stage_id', '=', 'classes.id');
        }
        return $model->newQuery()->select('stages.name_'.app()->getLocale().' as stage_name',
        'levels.name_'.app()->getLocale().' as level_name',
        'classes.name_'.app()->getLocale().' as class_name',
        'students.name_'.app()->getLocale().' as std_name',
        'students.student_code as std_code', 
        'students.id as id')
        ->join('level_student', 'level_student.student_id', '=', 'students.id')
        ->join('stages', 'level_student.stage_id', '=', 'stages.id')
        ->join('levels', 'level_student.level_id', '=', 'levels.id')
        ->join('classes', 'level_student.stage_id', '=', 'classes.id');

    }

    protected function getdata(Student $model){


// // dd(auth()->user()->roles->pluck('model_id'));

// // $data = $model->select(['stages.name_'.app()->getLocale().' as stage_name',
// // 'levels.name_'.app()->getLocale().' as level_name',
// // 'classes.name_'.app()->getLocale().' as class_name',
// // 'students.name_'.app()->getLocale().' as std_name'])
// // ->join('level_student', 'level_student.student_id', '=', 'students.id')
// // ->join('stages', 'level_student.stage_id', '=', 'stages.id')
// // ->join('levels', 'level_student.level_id', '=', 'levels.id')
// // ->join('classes', 'level_student.stage_id', '=', 'classes.id')->get()->response()->json();

// // return $data;
// $role = auth()->guard('admin')->user()->roles?auth()->guard('admin')->user()->roles->where('model_id','>','0')->pluck('model_id')->toArray():'';
// $data = [];
// if($role){


//     $tablename = auth()->guard('admin')->user()->roles->where('model_id','>','0')->pluck('table_name')->toArray();
// foreach($tablename as $index => $t){
//     if($index == 0){

//         $data = $modelselect('stages.name_'.app()->getLocale().' as stage_name',
//         'levels.name_'.app()->getLocale().' as level_name',
//         'classes.name_'.app()->getLocale().' as class_name',
//         'students.name_'.app()->getLocale().' as std_name',
//         'students.student_code as std_code', 
//         'students.id as id')
//         ->whereIn($t.'id',$role[$index])
//         ->join('level_student', 'level_student.student_id', '=', 'students.id')
//         ->join('stages', 'level_student.stage_id', '=', 'stages.id')
//         ->join('levels', 'level_student.level_id', '=', 'levels.id')
//         ->join('classes', 'level_student.stage_id', '=', 'classes.id');
//     }else{
//         // dd('next');
//         $data += $model->newQuery()->select('stages.name_'.app()->getLocale().' as stage_name',
//         'levels.name_'.app()->getLocale().' as level_name',
//         'classes.name_'.app()->getLocale().' as class_name',
//         'students.name_'.app()->getLocale().' as std_name',
//         'students.student_code as std_code', 
//         'students.id as id')
//         ->whereIn($t.'id',$role[$index])
//         ->join('level_student', 'level_student.student_id', '=', 'students.id')
//         ->join('stages', 'level_student.stage_id', '=', 'stages.id')
//         ->join('levels', 'level_student.level_id', '=', 'levels.id')
//         ->join('classes', 'level_student.stage_id', '=', 'classes.id');
//     }

// }
// return $data;

            // $data += $model->select('stages.name_'.app()->getLocale().' as stage_name',
            // 'levels.name_'.app()->getLocale().' as level_name',
            // 'classes.name_'.app()->getLocale().' as class_name',
            // 'students.name_'.app()->getLocale().' as std_name',
            // 'students.student_code as std_code', 
            // 'students.id as id')
            // ->whereIn('')
            // ->join('level_student', 'level_student.student_id', '=', 'students.id')
            // ->join('stages', 'level_student.stage_id', '=', 'stages.id')
            // ->join('levels', 'level_student.level_id', '=', 'levels.id')
            // ->join('classes', 'level_student.stage_id', '=', 'classes.id');
            // return $$data->newQuery();
        // }
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
            'processing' => true,
            'serverSide' => true,

            'buttons'      =>[
                ['extend' => 'create', 'className' => 'btn btn-success', 'text' => __('lang.create')],
                ['extend' => 'print', 'className' => 'btn btn-info', 'text' => __('lang.print')],
                ['extend' => 'excel', 'className' => 'btn btn-warning', 'text' => __('lang.excel')],
                ['extend' => 'pdf', 'className' => 'btn btn-danger', 'text' => __('lang.pdf')],
            ], 
            'initComplete' => "function () {
                
                
                this.api().columns([1,2,3,4,5]).every(function () {
                    var column = this;
                    var input = document.createElement(\"input\");
                    input.className = \"f_search\";
                    input.style = \"width:100px \" ;
                    $(input).appendTo($(column.footer()).empty())
                    .on('keyup', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            }
        
            "
        ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        
// $s = Student::find(17);

// dd($this->getdata($s));

// dd($this->query($s)->toJson());
// dd($datas);
//         $role = auth()->guard('admin')->user()->roles;
// dd($role);
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
            ],

            [
                'name' => 'students.student_code',
                'data' => 'std_code',
                'title' => __('lang.std_code'),
            ],  [
                'name' => 'students.name_'.app()->getLocale(),
                'data' => 'std_name',
                'title' => __('lang.name')
            ],  [
                'name' => 'stages.name_'.app()->getLocale(),
                'data' => 'stage_name',
                'title' => __('lang.stage')
            ],  [
                'name' => 'levels.name_'.app()->getLocale(),
                'data' => 'level_name',
                'title' => __('lang.level')
            ],  [
                'name' => 'classes.name_'.app()->getLocale(),
                'data' => 'class_name',
                'title' => __('lang.class')
            ],

           [
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
        return 'Students_' . date('YmdHis');
    }
}
