@extends('item.main')

@section('item_content')
  <table border="1">
    <tr>
      <td> Reference </td>
      <td> Description </td>
    </tr>
    @foreach($items as $item)
      <tr>
        <td> {{ $item->code_name }} </td>
        <td> {{ $item->name }} </td>
      </tr>
    @endforeach
  </table>



  <div style="font-size: 14px;">
    {{ $items->links() }}
  </div>
@endsection