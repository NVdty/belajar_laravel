@extends ('layout.mainlayout')

@section('title', 'student')

@section('content')
<h2> detail data siswa {{$student->name}}</h2>

<div class="my-3 d-flex justify-content-center">
    @if ($student->image !='')
        <img src="{{asset('storage/photo/'.$student->image)}}" alt="" width="200px"> 
    @else
        <img src="{{asset('images/default.png')}}" alt="" width="200px">  
    @endif
</div>


<div class="mt-5 mb-5">
    <table class="table table-bordered">
        <tr>
            <th>NIS</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Homeroom Teacher</th>
            <tr>
                <td>{{$student->nis}}</td>
                <td>
                    @if ($student->gender =='P')
                        Perempuan
                    @else
                        Laki-laki
                    @endif
                <td>{{$student->class->name}}</td>
                <td>{{$student->class->homeroomTeacher->name}}</td>
                </td>

            </tr>

        </tr>
        
    </table>
</div>

<div>
    <h3>Extracurriculars</h3>
    <ol>
    @foreach ($student->extracurriculars as $item)
     <li>{{$item->name}}</li>   
    @endforeach
    </ol>
</div>

<style>
    th{
        width: 25%;
    }
</style>

@endsection