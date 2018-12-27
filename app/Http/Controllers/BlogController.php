<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComentarioRequest;
use App\Models\Artigo;
use App\Models\Categoria;
use App\Repositories\ArtigoRepository;
use App\Repositories\ComentarioRepository;
use App\Repositories\UserRepository;
use App\Models\Comentario;
use App\User;
use Illuminate\Http\Request;
use Flash;

class BlogController extends Controller
{
    private $artigoRepository;
    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArtigoRepository $artigoRepo, UserRepository $userRepo, ComentarioRepository $comentarioRepo)
    {
        $this->artigoRepository = $artigoRepo;
        $this->userRepository = $userRepo;
        $this->comentarioRepository = $comentarioRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword =$request->get('search');
        $perPage =10;

        if(!empty($keyword)){
            $artigos = Artigo::where('titulo','LIKE',"$keyword%")
                ->paginate($perPage);
        }else{
            $artigos = Artigo::orderBy('id','desc')->take(6)->get();
        }
        $users = User::all();
        $categorias = Categoria::all();

        return view('blog.index', compact('artigos', 'users', 'categorias'));

    }

    public function post($id)
    {
        $artigo = $this->artigoRepository->findWithoutFail($id);        
        $comentarios = Comentario::where('artigo_id', '=', $id)->get();

        $users = User::all();

        if (empty($artigo)) {
            Flash::error('Artigo não encontrado');
            return view('blog.index', compact('artigos', 'users'));
        }

        return view('blog.post', compact('artigo', 'users','comentarios'));
    }

    public function comentario(CreateComentarioRequest $request, $id)
    {
        $artigo = $this->artigoRepository->findWithoutFail($id);

        $input = $request->all();

        $comentario = $this->comentarioRepository->create($input);

        $comentarios = Comentario::where('artigo_id', '=', $id)->get();
        
        $users = User::all();

        return view('blog.post', compact('artigo', 'users','comentarios'));
    }
}
