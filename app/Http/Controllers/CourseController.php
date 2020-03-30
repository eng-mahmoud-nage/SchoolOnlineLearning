<?php 

namespace App\Http\Controllers;

use App\SuperAdmin;
use Illuminate\Http\Request;
use App\StudentAffairs\Course;
use App\DataTables\CourseDataTable;
use Illuminate\Support\Facades\Hash;
use App\DataTables\MaterialDataTable;

class CourseController extends Controller 
{

 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(CourseDataTable $dataTable, Request $request)
  {
    if($request->has('level_id')){
      $courses = Course::where('level_id', $request->level_id)->get()->toArray();
      return ResponseJson(1,'messange', $courses);
    }
    else if($request->has('classs_id')){
      $courses = Course::where('classs_id', $request->classs_id)->get()->toArray();
      return ResponseJson(1,'messange', $courses);
    }

      return $dataTable->render('studentAffairs.course.all');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Course();
    return view('studentAffairs.course.create_edit_course', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

      $request->validate([
        'level_id' => 'required',
      ]);

    if($request->name_ar==null && $request->name_en==null){
      return back()->with('danger', __('lang.error'));
    }elseif($request->has('name_ar') && !$request->has('name_en')){
      $request->merge(['name_en' => $request->input('name_ar')]);
    }elseif(!$request->has('name_ar') && $request->has('name_en')){
      $request->merge(['name_ar' => $request->input('name_en')]);
    }

    $record = Course::create($request->all());

    return redirect(route("course.index"))->with('success', __('lang.inserted'));
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
    $record = Course::find($id);
    return view('studentAffairs.course.create_edit_course', compact('record'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
        
    // $request->validate([
    //   'sources.*' => 'image|mimes:png,jpg,gif',
    // ]);

// name of course
    if($request->name_ar==null && $request->name_en==null){
      return back()->with('danger', __('lang.error'));
    }elseif($request->has('name_ar') && !$request->has('name_en')){
      $request->merge(['name_en' => $request->input('name_ar')]);
    }elseif(!$request->has('name_ar') && $request->has('name_en')){
      $request->merge(['name_ar' => $request->input('name_en')]);
    }

    // name of teacher

    if($request->teacher_ar==null && $request->teacher_en==null){
      return back()->with('danger', __('lang.error'));
    }elseif($request->has('teacher_ar') && !$request->has('teacher_en')){
      $request->merge(['teacher_en' => $request->input('teacher_ar')]);
    }elseif(!$request->has('teacher_ar') && $request->has('teacher_en')){
      $request->merge(['teacher_ar' => $request->input('teacher_en')]);
    }

    $record = Course::find($id);
    $record->update($request->all());

    return redirect(route('course.index'))->with('success', __('lang.inserted'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Course::find($id)->delete();
    return redirect(route('course.index'))->with('warrning', __('تم الحذف بنجاح'));
  }


  public function materials(Request $request){
      if($request->has('course_id')){
            $course = Course::find($request->course_id);
            $data = $course->files;
            return ResponseJson(1,'messange', $data);
      }
  }


  public function viewFile()
  {
    $record = new Course;
    $status = '';
    return view('studentAffairs.course.material.create', compact('record', 'status'));
  }


  public function uploadFile(Request $request)
  {
    $record = Course::find($request->course_id);

    if($request->hasFile('sources')){
    foreach($request->file('sources') as $source){
        $record->files()->create(['source' => uploadImage($source), 'type' => 1, 'title' => $request->title]);
    }
    }
    if($request->has('source')){
    $record->files()->create(['source' => $request->source, 'type' => 0, 'title' => $request->title]);

    }

    $status = '';
    $record = new Course;
    return view('studentAffairs.course.material.create', compact('record', 'status'));
}
  public function destroyFile(Request $request)
  {
    $record = Course::find($request->course_id);
    $old = $record->files()->where('id', $request->file_id)->first();
    $remove =  $record->files()->where('id', $request->file_id)->delete();
    if($remove && $old->type ==1){
      if(File::exists(public_path('/uploads'))) {
        $f = File::delete(public_path('/uploads'.'/'.$old->source));
        return response()->json(['success'=>'Status change successfully.', 'data' => $f]);
    }
    }
    // return redirect()->back()->with('warrning', __('تم حذف الصوره بنجاح'));

  }
  
}

?>