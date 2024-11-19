@extends('Branch.main')

@section('branch_content')
  <h1> Branch list </h1>
  <table border="1" style="width: 100%">
    <tr>
      <td> Reference </td>
      <td> Description </td>
      <td> Cost </td>
      <td> W/ VAT </td>
      <td> Quantity </td>
      <td> Price
        <div class="hover-container">
          <div>?</div>
          <span class="hover-text">Text displayed on hover</span>
        </div>
      </td>
      <td> Discount </td>
    </tr>
    @foreach($branches as $branch)
      <tr>
        <td> {{ $branch->code_name }} </td>
        <td> {{ $branch->name }} </td>
        <td> {{ $branch->bussiness_name }} </td>
        <td> {{ $branch->address }} </td>
        <td> {{ $branch->contact_number }} </td>
        <td> {{ $branch->tin_number }} </td>
        <td> {{ $branch->type }} </td>
      </tr>
    @endforeach
  </table>
@endsection






