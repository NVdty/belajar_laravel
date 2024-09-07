<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;

class ClassController extends Controller
{
    public function index(){
        
        $class = ClassRoom::all(); //select * from class
        
        return view('classroom', ['classList'=> $class]);
    }
}
