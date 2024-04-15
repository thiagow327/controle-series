<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso); // with get argument string and create array with key : variable
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
        $request->session()->flash('mensagem.sucesso', 'Série adicionada com sucesso');
        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->series);
        $request->session()->flash('mensagem.sucesso', 'Série removida com sucesso');

        return to_route('series.index');
    }
}
