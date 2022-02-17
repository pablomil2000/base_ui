<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table;
use App\Models\User;

class WaiterController extends Controller
{
    public function index(){
        $tables = Table::Where('user_id', '=', auth()->user()->id)->get();
        return view('welcome', compact('tables'));
    }
}
