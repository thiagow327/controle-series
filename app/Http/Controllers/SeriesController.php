<?php

namespace App\Http\Controllers;

class SeriesController
{
    public function listarSeries()
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

        echo $html;
    }
}
