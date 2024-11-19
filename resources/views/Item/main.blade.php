@extends('main')

@section('content')
  <a href="{{ route('items') }}" style="margin-right: 10px;"> Items </a>
  <a href="{{ route('item.store') }}" style="margin-right: 10px;"> Create </a>
  <a href="{{ route('item.import') }}" style="margin-right: 10px;"> Import </a>
  <br><br>
  @yield('item_content')

@endsection