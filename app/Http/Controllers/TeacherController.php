<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
   public function index(){
    $teacher = Teacher::all(); //select * from students
    return view('teacher', ['teacherList'=> $teacher]);
   } 

   public function show($id){
      $teacher = Teacher::with('class')
      ->findOrFail($id);
      return view('teacher-detail', ['teacher'=> $teacher]);

   }
}
