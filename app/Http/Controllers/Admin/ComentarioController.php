<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateComentarioRequest;
use App\Http\Requests\UpdateComentarioRequest;
use App\Models\Comentario;
use App\Repositories\ComentarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ComentarioController extends AppBaseController
{
    /** @var  ComentarioRepository */
    private $comentarioRepository;

    public function __construct(ComentarioRepository $comentarioRepo)
    {
        $this->comentarioRepository = $comentarioRepo;
    }

    /**
     * Display a listing of the Comentario.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->comentarioRepository->pushCriteria(new RequestCriteria($request));
        $comentarios = Comentario::where('user_id', Auth::user()->id)->get();;

        return view('comentarios.index')
            ->with('comentarios', $comentarios);
    }

    /**
     * Show the form for creating a new Comentario.
     *
     * @return Response
     */
    public function create()
    {
        return view('comentarios.create');
    }

    /**
     * Store a newly created Comentario in storage.
     *
     * @param CreateComentarioRequest $request
     *
     * @return Response
     */
    public function store(CreateComentarioRequest $request)
    {
        $input = $request->all();

        $comentario = $this->comentarioRepository->create($input);

        if( Auth::user())
        {
            Flash::success('Comentario saved successfully.');

            return redirect(route('comentarios.index'));
        
        }
        else{
            return redirect(route('blog.post'));
        }
       
    }

    /**
     * Display the specified Comentario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comentario = $this->comentarioRepository->findWithoutFail($id);

        if (empty($comentario)) {
            Flash::error('Comentario not found');

            return redirect(route('comentarios.index'));
        }

        return view('comentarios.show')->with('comentario', $comentario);
    }

    /**
     * Show the form for editing the specified Comentario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comentario = $this->comentarioRepository->findWithoutFail($id);

        if (empty($comentario)) {
            Flash::error('Comentario not found');

            return redirect(route('comentarios.index'));
        }

        return view('comentarios.edit')->with('comentario', $comentario);
    }

    /**
     * Update the specified Comentario in storage.
     *
     * @param  int              $id
     * @param UpdateComentarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComentarioRequest $request)
    {
        $comentario = $this->comentarioRepository->findWithoutFail($id);

        if (empty($comentario)) {
            Flash::error('Comentario not found');

            return redirect(route('comentarios.index'));
        }

        $comentario = $this->comentarioRepository->update($request->all(), $id);

        Flash::success('Comentario updated successfully.');

        return redirect(route('comentarios.index'));
    }

    /**
     * Remove the specified Comentario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comentario = $this->comentarioRepository->findWithoutFail($id);

        if (empty($comentario)) {
            Flash::error('Comentario not found');

            return redirect(route('comentarios.index'));
        }

        $this->comentarioRepository->delete($id);

        Flash::success('Comentario deleted successfully.');

        return redirect(route('comentarios.index'));
    }
}
