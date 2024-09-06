@extends ('layout.mainlayout')
@section('title', 'Home')
@section('content')
    <h1> homepage</h1>
    <h2>welcome, {{$name}}. anda adalah {{$role}}</h2>

    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama</th>
        </tr>
        @foreach($buah as $data )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data}}</td>
        </tr>
        @endforeach
    </table>
    @endsection


     <!--if else
    @if ($role=='admin')
        <a href="">ke halaman admin</a>
    @elseif ($role=='staff')
        <a href=""> ke halaman staff</a>
    @endif -->

   <!--switch-case
     @switch($role)
        @case($role=='admin')
        <a href="">ke halaman admin</a>
        @break

        @case($role=='staff')
        <a href="">ke halaman staff</a>
        @break

        @default
        <a href="">tidak ada</a>

    @endswitch -->

   <!-- @for($i = 0; $i < 5; $i++)
    {{$i}} <br>
    @endfor -->