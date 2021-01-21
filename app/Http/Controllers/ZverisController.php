<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZverisController extends Controller
{
    public function bebras(Request $r, $kintamas, $kitas = 'Ruzava')
    {
        
        return 'BEBRAS Nr.: '.$kintamas.' Color: '. $r->p;
    }

    public function barsukas($color)
    {
        return view('zveris.barsukas', [
            'spalva' => $color,
            'valio' => 'URA!'
        ]);
    }


    public function p1()
    {
        return view('puslapis.p1', [
            
        ]);
    }

    public function p2()
    {
        return view('puslapis.p2', [
            
        ]);
    }



}

// http://localhost/miskas/public/skaiciuoti/suma/45/87
// http://localhost/miskas/public/skaiciuoti/skirtumas/12/8
// http://localhost/miskas/public/skaiciuoti/dalinti/12/8
// http://localhost/miskas/public/skaiciuoti/dauginti/12/8
