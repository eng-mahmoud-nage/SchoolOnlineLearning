<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentAffairs\Stage;
use App\DataTables\StageDataTable;
use App\Http\Controllers\Controller;



class StageController extends Controller 
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(StageDataTable $dataTable)
  {
      // $records = Stage::paginate(10);
      // return view('studentAffairs.stage.all', compact('records'));
      return $dataTable->render('studentAffairs.stage.all');

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Stage();
    return view('studentAffairs.stage.create&edit_stage', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name_en' => 'unique:stages',
      'name_ar' => 'unique:stages',
  ]);
  
  if($request->name_ar==null && $request->name_en==null){
    return back()->with('danger', 'Please Input Data');
  }elseif($request->has('name_ar') && !$request->has('name_en')){
      $request->merge(['name_en' => $request->input('name_ar')]);
    }elseif(!$request->has('name_ar') && $request->has('name_en')){
      $request->merge(['name_ar' => $request->input('name_en')]);
    }

    $record = Stage::create($request->all());

    return redirect(route('stage.index'))->with('success', __('lang.inserted'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $record = Stage::find($id);
    return view('studentAffairs.stage.create&edit_stage', compact('record'));
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
        'name_ar' => 'unique:stages,name_ar,'.$id,
        'name_en' => 'unique:stages,name_en,'.$id,
    ]);

    if($request->name_ar==null && $request->name_en==null){
      return back()->with('danger', 'Please Input Data');
    }elseif($request->has('name_ar') && !$request->has('name_en')){
      $request->merge(['name_en' => $request->input('name_ar')]);
    }elseif(!$request->has('name_ar') && $request->has('name_en')){
      $request->merge(['name_ar' => $request->input('name_en')]);
    }

    $record = Stage::find($id);
    $record->update($request->all());
    
    return redirect(route('stage.index'))->with('success', __('lang.updated'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Stage::find($id)->delete();
    return redirect(route('stage.index'))->with('Warrning', __('lang.deleted'));
  }
  
}

?>