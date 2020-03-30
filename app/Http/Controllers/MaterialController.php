<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\StudentAffairs\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use App\DataTables\MaterialDataTable;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MaterialDataTable $dataTable, Request $request)
    {
        if ($request->has('course_id') && $request->course_id != null) {
            $files = File::where('fileable_id', $request->course_id)->get();
            return view('studentAffairs.course.material.all',compact('files'));
        }

        // return $dataTable
        // ->with('course_id', $request->course_id)
        // ->render('studentAffairs.course.material.all');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $record = new File;
        return view('studentAffairs.course.material.edit', compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $record = Course::find($request->course_id);

        if ($request->hasFile('sources')) {
            foreach ($request->file('sources') as $source) {
                $file = uploadImage($source);
               $record->files()->create(['source' => $file, 'type' => 'file', 'title_en' => $request->title_en, 'title_ar' => $request->title_ar]);
            }
        }
        if ($request->has('source') && $request->source != null) {
            $record->files()->create(['source' => $request->source, 'type' => 'video', 'title_en' => $request->title_en, 'title_ar' => $request->title_ar]);
        }
        return redirect(route('material.create'))->with('success', __('lang.inserted'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = File::find($id);
        return view('studentAffairs.course.material.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $file = File::find($id);
        $record = Course::find($file->fileable_id);

        if ($request->hasFile('sources')) {
            foreach ($request->file('sources') as $source) {
                $create = $record->files()
                ->create(['source' => uploadImage($source), 'type' => 'file', 'title_en' => $request->title_en, 'title_ar' => $request->title_ar]);
                if($create){
                    $create = $record->files()->where('id', $id)->delete();
                }else{
                  return redirect()->back()->with('danger', 'not created');
                }
            }
        }
        if ($request->has('source') && $request->source != null) {
            $record->files()->where('id', $id)
            ->update(['source' => $request->source, 'type' => 'video', 'title_en' => $request->title_en, 'title_ar' => $request->title_ar]);
        }
        return redirect(url('/select-course'))->with('success', __('lang.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = File::find($id);
        $record->delete();
        return redirect()->back()->with('danger', __('lang.deleted'));

    }
}
