@extends ('layout.mainlayout')

@section('title', 'student')

@section('content')

<div class="mt-5">
    <h2> are you sure to delete the data: {{$student->name}} ({{$student->nis}})</h2>

    <form style="display: inline-block" action="/student-destroy/{{$student->id}}" method="POST">
        @csrf
        @method('DELETE')
    <button type="submit" class= "btn btn-danger">delete</button>
    </form>

    <a href="/students" class="btn btn-primary">Cancel</a>
    
</div>
@endsection