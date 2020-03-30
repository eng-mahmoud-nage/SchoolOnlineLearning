<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAffairs\Admin;
use App\DataTables\AdminsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;



class AdminController extends Controller 
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(AdminsDataTable $dataTable)
  {
      return $dataTable->render('studentAffairs.admin.all');
      // $records = Admin::find(1);
      // $records->permissions;
      // dd( $records->permissions);
      // return view('studentAffairs.admin.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Admin();
    return view('studentAffairs.admin.create&edit_admin', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
        'name_ar' => 'required',
        'name_en' => 'required',
        'email' => 'required|email|unique:admins',
        'password' => 'required',
        'permission_list' => 'array',
        'role_list' => 'array',
    ]);
    $request->merge(['password' => Hash::make($request->input('password'))]);
    $record = Admin::create($request->except('permission_list'));
    $record->givePermissionTo($request->input('permission_list'));
    $record->assignRole($request->input('role_list'));
    return redirect(route('admins.index'))->with('success', __('lang.inserted'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $record = Admin::find($id);
    return view('studentAffairs.admin.create&edit_admin', compact('record'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
        'name_ar' => 'required',
        'name_en' => 'required',
        'email' => 'required|email|unique:admins,email,'.$id,
    ]);

    $record = Admin::find($id);
    $record->syncPermissions($request->input('permission_list'));
    $record->syncRoles($request->input(['role_list']));
    $request->merge(['password' => Hash::make($request->input('password'))]);
    $record->update($request->except('active', 'password'));
    // $user->syncRoles($request->input('role_list'));
    // $user->syncPermissions($request->input('permission_list'));
    return redirect(route('admins.index'))->with('success', __('lang.updated'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Admin::find($id)->delete();
    return redirect(route('admins.index'))->with('Warrning', __('lang.deleted'));
  }

  public function login(Request $request)
  {
      $request->validate([
          'email' => 'required|exists:admins',
          'password' => 'required'
      ]);
      

      $record = Admin::where('email', $request->email)->first();
      if ($record) {
          if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) {                
            return redirect('/dashboard');
          } else {
              return redirect('/sys-login')->with('danger', 'this user not found in our system');
          }
      }
  }
  public function forget_pass(Request $request)
  {

    if($request->password == null){
        return view('studentAffairs.auth.forgot-pass');
    }
      $request->validate([
          'email' => 'required|exists:admins',
          'password' => 'required'
      ]);
      

      $record = Admin::where('email', $request->email)->first();
      if ($record) {
              $record->update(['password' => Hash::make($request->password)]);
              return redirect('/sys-login')->with('success', _("lang.pass_confirm"));
          }
          return redirect('/sys-login')->with('danger', _("lang.pass_not_confirm"));

      }
  
  
}

?>