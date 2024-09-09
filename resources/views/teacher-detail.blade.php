@extends ('layout.mainlayout')

@section('title', 'teacher')

@section('content')
<h2> detail data teacher {{$teacher->name}}</h2>

<div class="mt-5">
    <h3>
            Class :
        @if ($teacher->class)
            {{$teacher->class->name}}
        @else
            -        
        @endif 
    </h3>
</div>

<div class='mt-5'>
    <h4> List Student</h4>
    <ol>
        @foreach ($teacher->class->students as $item)
        - {{$item-> name}} <br>
        @endforeach
    </ol>
</div>



@endsection