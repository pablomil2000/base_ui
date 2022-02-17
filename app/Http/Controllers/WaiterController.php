<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\table;
use App\Models\User;

class WaiterController extends Controller
{
    public function tables(){
        $id = auth()->user()->id;
        $tables = Table::Where('user_id', '=', $id)->get();
        return $tables;
    }
}
