<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemsImport;
use App\Models\Item;

class ItemController extends Controller
{
  public function index()
  {
    $items = Item::with([
        'costs' => function ($query) {
            $query->orderBy('created_at', 'desc')->limit(1);
        },
        'locations' => function ($query) {
            $query->select('locations.id','locations.name');
        }
      ])->paginate(100);
    return view('Item.items', compact('items'));
  }

  public function import()
  {
    return view('Item.import');
  }
  
  public function import_post(Request $request)
  {
    $request->validate(['items' => 'required|mimes:xlsx,csv']);

    Excel::import(new ItemsImport($request->branch), $request->file('items'));

    return redirect()->back()->with('success', 'Users imported successfully!');
  }
}
