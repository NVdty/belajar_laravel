@extends ('layout.mainlayout')

@section('title', 'ClassRoom')

@section('content')
    <h1> halaman Class</h1>
     <h3>Class List</h3>
  <table class=table>
   <thead>
    <tr>
        <th> No. </th>
        <th> Nama </th>
        <th> Students</th>
    </tr>
   </thead> 
   <tbody>
    @foreach($classList as $data)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$data->name}}</td>
        <td>
            @foreach($data->students as $student)
           - {{$student['name']}} <br>
            @endforeach
        </td>
    </tr>
    @endforeach
   </tbody>
</table>
@endsection