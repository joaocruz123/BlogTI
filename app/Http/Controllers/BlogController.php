<?php

namespace App\Http\Controllers;

use App\Repositories\ArtigoRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $artigoRepository;
    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArtigoRepository $artigoRepo, UserRepository $userRepo)
    {
        $this->artigoRepository = $artigoRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigos = $this->artigoRepository->all()->take(4);
        $users = User::all();

        return view('blog', compact('artigos', 'users'));

    }
}
