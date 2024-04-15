<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::query()->orderBy('nome')->get();

        return view('series.index')->with('series', $series); // with get argument string and create array with key : variable
    }

    public function create()
    {
        return view('series.create');
    }

    //  public function store(Request $request)
    //  {
    //      Serie::create([$request->all()]);

    //      return to_route('series.index');
    //  }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        Serie::create([
            'nome' => $request->input('nome'),
        ]);
        return to_route('series.index');
    }
}
