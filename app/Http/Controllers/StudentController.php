<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    public function index(Request $request){
        
    //lazy loading (relation)
        // $student = Student::all(); //select * from students
        // return view('student', ['studentList'=> $student]);
    
    //eager loading (relation)
    //many to many
    //bagian class.homeroomTeacher = nested relation

    $keyword = $request->keyword; //fitur search dengan paginate
    //paginate membatasi data yang tampil pada halaman page
    $student = Student::with('class') // search relasi 
                    ->where('name', 'LIKE', '%'.$keyword. '%') //select * from students
                    ->orWhere('gender', $keyword)
                    ->orWhere('nis', 'LIKE', '%'.$keyword.'%')
                    ->orWhereHas('class', function($query) use ($keyword){ // use keyword untuk dapat menggunakan/dpt dikenali $keyword karna didalam query
                        $query->where('name', 'LIKE', '%'.$keyword.'%');
                    })
                    ->paginate(10);

    return view('student', ['studentList'=> $student]);
    }

    public function show($id){
        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])
        ->findOrFail($id);
        return view('student-detail', ['student'=> $student]);
    }

    public function create(){
      //eloquent read
        $class = ClassRoom::select('id', 'name')->get();
        return view('student-add',['class' => $class]);
    }

    public function store(StudentCreateRequest $request){

        $newName = '';

        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension; //fitur upload foto dg nama dan waktu(berbeda)
            $request->file('photo')->storeAs('photo', $newName);
        }

        // // $validated = $request->validate ([
        // //     // 'nis' => 'unique:students|max:8', // validated pindah ke StudentCreateRequest
        // //     // 'name' => 'max:50'
        // ]);

        // menambah data baru ke datbase dg mass asignment 
        $request['image']= $newName;
        $student= Student::create($request->all());
       //flash session(notif)
       if($student){
            Session::flash('status', 'success');
            Session::flash('message', 'add new students success!');
        }

       return redirect('/students');
    }


    public function edit(Request $request, $id){
        //eloquent update
        $student = Student::with('class')->findOrFail($id);
        $class = ClassRoom::where('id','!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', ['student' => $student], ['class' => $class]);
    }

    public function update(Request $request, $id){
        //eloquent updt
        $student =Student::findOrFail($id);

        
        $student->update($request->all());
        return redirect('/students');
    }

    public function delete($id){
        //eloquent delete
        $student =Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id){
        //eloquent delete
        $deletedStudent = student::findOrFail($id);
        $deletedStudent->delete();

            if($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'delete student success!');
           }

        return redirect('/students');
    }

    public function deletedStudent(){

        $deletedStudent = Student::onlyTrashed()->get();
        return view('student-deleted-list',['student'=> $deletedStudent]);
    }

    public function restore($id){
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();
        return redirect('/students');
    }
}   
    

    

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
