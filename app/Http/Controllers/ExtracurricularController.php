<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    public function index()
    {
        //many to many
    $ekskul = Extracurricular::with('students')->get();
    return view('extracurricular', ['ekskulList'=> $ekskul]);
   }
}
 