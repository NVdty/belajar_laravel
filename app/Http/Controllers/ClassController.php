<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;

class ClassController extends Controller
{
    public function index(){

        //lazy loading
        // $class = ClassRoom::all(); //cara req data -> ketika dibutuhkan ambil data
        //select * from table class
        //select * from student where class =  1A
        //select * from student where class =  1B
        //select * from student where class =  1C

        //eager loading
        $class = ClassRoom::with('students')->get() ;
        //select * from table class
        //select * from student where class in (1A, 1B, 1C)
        //semua load harus memanggil data di view class 
        
        return view('classroom', ['classList'=> $class]);
    }
}
