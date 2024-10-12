@extends('item.main')

@section('item_content')
  
  <h1> Import Items </h1>
  <form action="{{ route('item.import') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="items">
    <input type="submit">
  </form>

@endsection