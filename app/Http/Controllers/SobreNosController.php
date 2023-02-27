<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    // Inclusão de  Middleware no controlador
    // public function __construct()
    // {
    //     $this->middleware(LogAcessoMiddleware::class);
    // }

    public function __construct()
    {
        $this->middleware('log.acesso');
    }

    public function principal() {
        return view('site.sobre-nos');
    }
}
