<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Train;

class PageController extends Controller
{
    public function index()
    {
        $trains = Train::paginate(10);

        return view('home', compact('trains'));
    }

    public function fromRome()
    {
        $trains = Train::where('departure_station', 'roma')->get();

        return view('from-rome', compact('trains'));
    }
}
