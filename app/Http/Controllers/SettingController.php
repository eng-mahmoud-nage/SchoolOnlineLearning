<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAffairs\Setting;

class SettingController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
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
    $record = Setting::find($id);
    return view('studentAffairs.setting.edit_setting', compact('record'));
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
        'stages_ar' => 'unique:settings,stages_ar,'.$id,
        'stages_en' => 'unique:settings,stages_en,'.$id,
        'educ_admin_name_ar' => 'unique:settings,educ_admin_name_ar,'.$id,
        'educ_admin_name_en' => 'unique:settings,educ_admin_name_en,'.$id,
        'school_name_ar' => 'unique:settings,school_name_ar,'.$id,
        'school_name_en' => 'unique:settings,school_name_en,'.$id,
    ]);

    if($request->stages_ar==null && $request->stages_en==null){
      return back()->with('danger', 'Please Input Data');
    }elseif($request->has('stages_ar') && !$request->has('stages_en')){
      $request->merge(['stages_en' => $request->input('stages_ar')]);
    }elseif(!$request->has('stages_ar') && $request->has('stages_en')){
      $request->merge(['stages_ar' => $request->input('stages_en')]);
    }
    
    if($request->educ_admin_name_ar==null && $request->educ_admin_name_en==null){
      return back()->with('danger', 'Please Input Data');
    }elseif($request->has('educ_admin_name_ar') && !$request->has('educ_admin_name_en')){
      $request->merge(['stages_en' => $request->input('educ_admin_name_ar')]);
    }elseif(!$request->has('educ_admin_name_ar') && $request->has('educ_admin_name_en')){
      $request->merge(['educ_admin_name_ar' => $request->input('educ_admin_name_en')]);
    }
    
    if($request->school_name_ar==null && $request->school_name_en==null){
      return back()->with('danger', 'Please Input Data');
    }elseif($request->has('school_name_ar') && !$request->has('school_name_en')){
      $request->merge(['school_name_en' => $request->input('school_name_ar')]);
    }elseif(!$request->has('school_name_ar') && $request->has('school_name_en')){
      $request->merge(['school_name_ar' => $request->input('school_name_en')]);
    }

    $record = Setting::find($id);
    $record->update($request->all());
    
    return back()->with('success', __('lang.updated'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }
  
  
}

?>