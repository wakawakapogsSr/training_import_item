@extends('Item.main')

@section('item_content')
  <table border="1" style="width: 100%">
    <tr>
      <td> Reference </td>
      <td> Description </td>
      <td> Cost </td>
      <td> 
        <div class="hover-container">
          W/ VAT 🛈
          <span class="hover-text"> w/VAT = Cost * 12% </span>
        </div>
      </td>
      <td>
        <div class="hover-container">
          Quantity 🛈
          <span class="hover-text"> Total quantity of all branches </span>
        </div>
       </td>
      <td> 
        <div class="hover-container">
          Price 🛈
          <span class="hover-text"> Price = Cost w/VAT + Markup_Amount </span>
        </div>
      </td>
      <td> Discount </td>
      <td> Location </td>
    </tr>
    @foreach($items as $item)
      <tr>
        <td> {{ $item->code_name }} </td>
        <td> {{ $item->name }} </td>
        <td> {{ optional($item->costs)->first()->amount / 1000 }} </td>
        <td> {{ $item->costs->first()->with_vat? 'yes':'no' }} </td>
        <td> total quantity </td>
        <td></td>
        <td></td>
        <td> {{ $item->locations->first()->name }} </td>
      </tr>
    @endforeach
  </table>
  <div style="font-size: 14px;">
    {{ $items->links() }}
  </div>
@endsection