<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;    //<---- Laravel session
use App\Models\Result;

class CalcController extends Controller
{
    public function show()
    {
        $result = Session::get('rez', '');
        Session::forget('rez');
        $resultsHistory = Result::all(); // <--- paims viska is db
        return view('calc.show_form', ['result' => $result, 'history' => $resultsHistory]);
    }

    public function do(Request $r)
    {
        $result = $r->x + $r->y; // <----- tiesiog suma
        Session::put('rez', $result);

        $res = new Result; // <---- naujas rezultatu objektas

        // pildome objekta
        $res->numb1 = $r->x;
        $res->numb2 = $r->y;
        $res->result = $result;

        // uzsaugome duomenu bazeje
        $res->save();

        return redirect()->route('show');

    }
}
