<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;    //<---- Laravel session

class CalcController extends Controller
{
    public function show()
    {
        return view('calc.show_form');
    }

    public function do(Request $r)
    {
        $result = $r->x + $r->y; // <----- tiesiog suma
        // dd($result);
        return redirect()->route('show');

    }
}
