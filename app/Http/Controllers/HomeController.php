<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($caixa = "inbox")
    {
        if($caixa=="sent") {
            $mensagens = \Auth::user()->caixaSaida;
        } else {
            $mensagens = \Auth::user()->caixaEntrada;
        }


        return view('home')->with(["mensagens"=> $mensagens, "caixa" => $caixa]);
    }
}
