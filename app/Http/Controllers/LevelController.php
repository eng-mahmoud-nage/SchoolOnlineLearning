<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAffairs\Level;
use App\DataTables\LevelDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;



class LevelController extends Controller 
{

   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request, LevelDataTable $dataTable)
  {
    if($request->has('stage_id')){
      $levels = Level::where('stage_id', $request->stage_id)->get()->toArray();
      return ResponseJson(1,'messange', $levels);
    }

    return $dataTable->render('studentAffairs.level.all');

      // $records = Level::paginate(10);
      // return view('studentAffairs.level.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Level();
    return view('studentAffairs.level.create&edit_level', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

    $request->validate([
      // 'name_ar'  => 'unique:levels',
      // 'name_en'  => 'unique:levels',
      'stage_id' => 'required',

  ]);
  
  if($request->name_ar==null && $request->name_en==null){
    return back()->with('danger', __('lang.error'));
  }elseif($request->has('name_ar') && !$request->has('name_en')){
    $request->merge(['name_en' => $request->input('name_ar')]);
  }elseif(!$request->has('name_ar') && $request->has('name_en')){
    $request->merge(['name_ar' => $request->input('name_en')]);
  }

    $request->merge(['password' => Hash::make($request->input('password'))]);
    $record = Level::create($request->all());

    return redirect(route('level.index'))->with('success', __('lang.inserted'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $record = Level::find($id);
    return view('studentAffairs.level.create&edit_level', compact('record'));
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
        // 'name_ar' => 'unique:levels,name_ar,'.$id,
        // 'name_en' => 'unique:levels,name_en,'.$id,
        // 'cost' => 'required',
        'stage_id' => '',
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
    $record = Level::find($id);
    $record->update($request->all());
    
    return redirect(route('level.index'))->with('success', __('lang.updated'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Level::find($id)->delete();
    return redirect(route('level.index'))->with('Warrning', __('lang.deleted'));
  }
  
}

?>