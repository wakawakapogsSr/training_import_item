@extends('main')

@section('content')
  <a href="{{ route('branches') }}" style="margin-right: 10px;"> Branches </a>
  <br><br>
  @yield('branch_content')

@endsection