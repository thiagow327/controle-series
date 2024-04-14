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

        $html = '<ul>';
        foreach ($series as $serie) {
            $html .= "<li> $serie </li>";
        }
        $html .= '</ul>';

        return ($html);
    }
}
