<?php

namespace App\Http\Controllers\admin;

use App\Models\Party;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartyController extends Controller
{
    public function allParties()
    {
        $parties = Party::all();
        return view('admin/party/allParties', compact('parties'));
    }

    public function partiesUser()
    {
        $parties = Party::all()->groupBy('user_id');
        
        // return $parties;
        return view('admin/party/partiesUser', compact('parties'));
    }
}
