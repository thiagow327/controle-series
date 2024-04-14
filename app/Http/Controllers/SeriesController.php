<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = [
            'Prision Break',
            'Grey\'s Anatomy',
            'Lost'
        ];

        return view('listar-series', [
            'series' => $series
        ]);
    }
}
