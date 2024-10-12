@extends('item.main')

@section('item_content')

  <h1> Create Form </h1>
  <form>
    <p> Serial <input type="text" name="code_name"></p>
    <p> Description <input type="text" name="name"></p>
    <input type="submit">
  </form>

@endsection