@extends('main')

@section('content')
  <a href="{{ route('items') }}"> Items </a>
  <a href="{{ route('item.store') }}"> Create </a>
  <a href="{{ route('item.import') }}"> Import </a>
  <br><br>
  @yield('item_content')

@endsection