<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        
    //lazy loading (relation)
        // $student = Student::all(); //select * from students
        // return view('student', ['studentList'=> $student]);
    
    //eager loading (relation)
    //many to many
    $student = Student::with(['class', 'extracurriculars'])->get(); //select * from students
    return view('student', ['studentList'=> $student]);
    

    

        //collection methods
        // $nilai = [9,8,7,6,4,8,9,1,10,3,9,7,1,5,3,9];
        // $ceknilai = collect($nilai)->map(function($value){
        //     return $value *2;
        // })->all();
    
        // dd($ceknilai);

        // dd($nilai);

        
        // $nilaiRataRata= collect($nilai)->avg();
        // dd($nilaiRataRata);


        //read query builder 
        // $student = DB::table('students')->get();
        // dd($student); 

        //create query builder
        // DB::table('students')->insert([
        //     'name' => 'query',
        //     'gender' => 'L',
        //     'nis' => '0101009',
        //     'class_id' => 2,

        //update query
        // DB::table('students')->where('id', 29)->update([
        //     'name' => 'qualent',
        //     'class_id' => '3',
        // ]);

        //delete query
        // DB::table('students')->where('id', 30)->delete();

        // ])
     
        // //read eloquent
        // $student = student::all();
        // dd($student); 
        
        //create eloquent
        // student::create([
        //     'name' => 'eloque',
        //      'gender' => 'P',
        //      'nis' => '0101008',
        //      'class_id' => 2
        // ]);

        //update eloquent
    //     student::find(29)->update([
    //     'name'=> 'eloe',
    //     'class_id' => '1',
    // ]);

    //delete eloquent
        // student::find(29)->delete();
    }
}