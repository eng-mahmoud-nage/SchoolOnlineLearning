<?php

namespace App\Http\Controllers;

use App\SuperAdmin;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{

public function all(){
    $record = SuperAdmin::first();
    return view('super-admin', compact('record'));
}

    public function Setting(Request $request){
        $record = SuperAdmin::first();
        if($record){
            $record->update($request->all());
        }else{
            SuperAdmin::create($request->all());
        }
        return back();
    }
}
