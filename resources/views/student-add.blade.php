@extends ('layout.mainlayout')

@section('title', 'Add New Student')

@section('content')

<div class="mt-5 col-6 m-auto">

    <!--validasi - notif error-->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<form action="student" method="post">
    @csrf
    <div class="mb-3">
        <label for="name"> Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control" required>
            <option value="">select one</option>
            <option value="L">L</option>
            <option value="P">P</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="nis">NIS</label>
        <input type="text" name="nis" id="nis" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="class">Class</label>
        <select name="class_id" id="class" class="form-control" required>
            <option value="">select one</option>
            @foreach ($class as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
                
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <button class="btn btn-success" type="submit">Save</button>
    </div>

</form>
</div> 


@endsection