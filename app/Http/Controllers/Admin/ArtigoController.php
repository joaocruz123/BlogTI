<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateArtigoRequest;
use App\Http\Requests\UpdateArtigoRequest;
use App\Models\Artigo;
use App\Models\Categoria;
use App\Repositories\ArtigoRepository;
use App\Http\Requests;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;


class ArtigoController extends AppBaseController
{
    /** @var  ArtigoRepository */
    private $artigoRepository;
    private $categoriaRepository;

    public function __construct(ArtigoRepository $artigoRepo, CategoriaRepository $cateoriaRepo)
    {
        $this->artigoRepository = $artigoRepo;
        $this->categoriaRepository = $cateoriaRepo;
    }

    /**
     * Display a listing of the Artigo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->artigoRepository->pushCriteria(new RequestCriteria($request));
        $artigos = Artigo::where('user_id', Auth::user()->id)->get();
        $categoria_id = $this->categoriaRepository->all();

        return view('artigos.index', compact('categoria_id'))->with('artigos', $artigos);
    }

    /**
     * Show the form for creating a new Artigo.
     *
     * @return Response
     */
    public function create()
    {
        return view('artigos.create');
    }

    /**
     * Store a newly created Artigo in storage.
     *
     * @param CreateArtigoRequest $request
     *
     * @return Response
     */
    public function store(CreateArtigoRequest $request)
    {
        $artigo = new Artigo();

        $artigo->user_id = $request->input('user_id');
        $artigo->categoria_id = $request->input('categoria_id');
        $artigo->titulo = $request->input('titulo');
        $artigo->descricao = $request->input('descricao');
        $artigo->corpo = $request->input('corpo');
        if ($request->hasFile('imagem')){
            $image = $request->file('imagem');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/imagens');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);

            $artigo->imagem = $name;
        }

        $artigo->save();

        Flash::success('Artigo saved successfully.');

        return redirect(route('artigos.index'));
    }

    /**
     * Display the specified Artigo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $artigo = $this->artigoRepository->findWithoutFail($id);

        if (empty($artigo)) {
            Flash::error('Artigo not found');

            return redirect(route('artigos.index'));
        }

        return view('artigos.show')->with('artigo', $artigo);
    }

    /**
     * Show the form for editing the specified Artigo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $artigo = $this->artigoRepository->findWithoutFail($id);

        if (empty($artigo)) {
            Flash::error('Artigo not found');

            return redirect(route('artigos.index'));
        }

        return view('artigos.edit')->with('artigo', $artigo);
    }

    /**
     * Update the specified Artigo in storage.
     *
     * @param  int              $id
     * @param UpdateArtigoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArtigoRequest $request)
    {
        $artigo = Artigo::findOrFail($id);

        if (empty($artigo)) {
            Flash::error('Artigo não encontrado');

            return redirect(route('artigos.index'));
        }

        $artigo->user_id = $request->input('user_id');
        $artigo->categoria_id = $request->input('categoria_id');
        $artigo->titulo = $request->input('titulo');
        $artigo->descricao = $request->input('descricao');
        $artigo->corpo = $request->input('corpo');
        if ($request->hasFile('imagem')){
            $image = $request->file('imagem');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/imagens');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);

            $artigo->imagem = $name;
        }

        $artigo->save();

        Flash::success('Artigo updated successfully.');

        return redirect(route('artigos.index'));
    }

    /**
     * Remove the specified Artigo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $artigo = $this->artigoRepository->findWithoutFail($id);

        if (empty($artigo)) {
            Flash::error('Artigo not found');

            return redirect(route('artigos.index'));
        }

        $this->artigoRepository->delete($id);

        Flash::success('Artigo deleted successfully.');

        return redirect(route('artigos.index'));
    }
}
