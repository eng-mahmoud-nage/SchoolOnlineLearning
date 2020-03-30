<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAffairs\Classs;
use App\DataTables\ClassDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;




class ClassController extends Controller 
{

   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request, ClassDataTable $dataTable)
  {
    if($request->has('level_id')){
      $classes = Classs::where('level_id', $request->level_id)->get()->toArray();
      return ResponseJson(1,'messange', $classes);
    }

    $record = Classs::with('level')->get();
    return $dataTable->render('studentAffairs.class.all', compact('record'));


      // $records = Classs::paginate(10);
      // return view('studentAffairs.class.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Classs();
    return view('studentAffairs.class.create&edit_class', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      // 'name_ar' => 'unique:classes',
      // 'name_en' => 'unique:classes',
  ]);
  if($request->name_ar==null && $request->name_en==null){
    return back()->with('danger', 'Please Input Data');
  }elseif($request->has('name_ar') && !$request->has('name_en')){
    $request->merge(['name_en' => $request->input('name_ar')]);
  }elseif(!$request->has('name_ar') && $request->has('name_en')){
    $request->merge(['name_ar' => $request->input('name_en')]);
  }

    $request->merge(['password' => Hash::make($request->input('password'))]);
    $record = Classs::create($request->all());

    return redirect(route('class.index'))->with('success', __('lang.inserted'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $record = Classs::find($id);
    return view('studentAffairs.class.create&edit_class', compact('record'));
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
        // 'name_ar' => 'unique:classes,name_ar,'.$id,
        // 'name_en' => 'unique:classes,name_en,'.$id,
    ]);
    if($request->name_ar==null && $request->name_en==null){
      return back()->with('danger', 'Please Input Data');
    }elseif($request->has('name_ar') && !$request->has('name_en')){
      $request->merge(['name_en' => $request->input('name_ar')]);
    }elseif(!$request->has('name_ar') && $request->has('name_en')){
      $request->merge(['name_ar' => $request->input('name_en')]);
    }

    
    if($request->has('password') && $request->password != null)
    {
      $request->merge(['password' => Hash::make($request->input('password'))]);
    }

    $record = Classs::find($id);
    $record->update($request->all());
    
    return redirect(route('class.index'))->with('success', __('lang.updated'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Classs::find($id)->delete();
    return redirect(route('class.index'))->with('Warrning', __('lang.deleted'));
  }
  
}

?>