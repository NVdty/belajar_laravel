@extends ('layout.mainlayout')

@section('title', 'class')

@section('content')
<h2> detail data class {{$class->name}}</h2>

<div class="mt-5">
    <h4>Homeroom Teacher : {{$class->homeroomTeacher->name}} </h4>
</div>

<div class=mt-5>
    <h4>Student List</h4>
    <ol>
        @foreach ($class->students as $item)
           <li>{{$item->name}}</li> 
        @endforeach
    </ol>
</div>

@endsection