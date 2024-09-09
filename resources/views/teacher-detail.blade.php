@extends ('layout.mainlayout')

@section('title', 'teacher')

@section('content')
<h2> detail data teacher {{$teacher->name}}</h2>

<div class="mt-5">
    <h3>class: {{$teacher->class->name}} </h3>

</div>



@endsection