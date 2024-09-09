@extends ('layout.mainlayout')

@section('title', 'extracurricular')

@section('content')
<h2> detail data extracurricular {{$ekskul->name}}</h2>

<div class="mt-5">
    <h3>List Anggota</h3>
    <ol>
    @foreach ($ekskul->students as $item)
    - {{$item->name}}  <br>
    @endforeach
    </ol>
</div>

@endsection

