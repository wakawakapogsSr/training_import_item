<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
  public function index()
  {
    $branches = Branch::all();
    return view('Branch.branches',compact('branches'));
  }
}
