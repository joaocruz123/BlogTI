<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Categoria;
use App\Models\Comentario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPosts = Artigo::where('user_id', Auth::user()->id)->count();
        $totalComments = Comentario::where('user_id', Auth::user()->id)->count();
        $totalCat = Categoria::count();
        $totalUsers = User::count();

        return view('home', compact('totalPosts', 'totalComments','totalCat','totalUsers'));
    }
}
