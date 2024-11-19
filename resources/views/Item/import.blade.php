@extends('item.main')

@section('item_content')
  
  <h1> Import Items </h1>
  <form action="{{ route('item.import') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <select name="branch_id">
      @foreach(App\Models\Branch::all() as $branch)
        @if($branch->code_name == 'MWH')
          <option value="{{ $branch->id }}" selected> [{{ $branch->code_name }}] {{ $branch->name }} </option>
        @else
          <option value="{{ $branch->id }}"> [{{ $branch->code_name }}] {{ $branch->name }} </option>
        @endif
      @endforeach
    </select><br><br>
    <input type="file" name="items"><br><br>
    <input type="submit">
  </form>

@endsection