<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\DataTables\PermissionDataTable;
use Spatie\Permission\Models\Permission;



class PermissionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return .Illuminate.Http.Response
     */
    public function index(PermissionDataTable $dataTable)
    {
        return $dataTable->render('studentAffairs.permission.all');

        // $records = Permission::all();
        // return view('studentAffairs.permission.all', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return .Illuminate.Http.Response
     */
    public function create()
    {
        $record = new Permission();
        return view('studentAffairs.permission.create&edit_permission', compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  .Illuminate.Http.Request  $request
     * @return .Illuminate.Http.Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|unique:permissions',
            'name' => 'required|unique:permissions',

//            'role_list' => 'required|array',
        ]);
        $permission = Permission::create($request->except('name_en'));
//        $role = Role::where('id', [$request->input('role_list')])->get();
//        $role->givePermissionTo($permission);
        if ($request->has('Add More')){
            dd("more");
        }
        return redirect(route('permission.index'))->with('session', 'Permission Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return .Illuminate.Http.Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return .Illuminate.Http.Response
     */
    public function edit($id)
    {
        $record = Permission::findById($id);
        return view('studentAffairs.permission.create&edit_permission', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  .Illuminate.Http.Request  $request
     * @param  int  $id
     * @return .Illuminate.Http.Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        ]);

        $permission = Permission::findById($id);
        $permission->update($request->all());
        return redirect(route('permission.index'))->with('session', 'Permission Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return .Illuminate.Http.Response
     */
    public function destroy($id)
    {
        $permission = Permission::findById($id)->delete();
        return redirect(route('permission.index'))->with('session', 'Permission Deleted');
    }
}
