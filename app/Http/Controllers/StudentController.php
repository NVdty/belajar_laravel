<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    public function index(){
        
        $student = Student::all(); //select * from students
        
        return view('student', ['studentList'=> $student]);
    }
}
