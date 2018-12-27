<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComentarioAPIRequest;
use App\Http\Requests\API\UpdateComentarioAPIRequest;
use App\Models\Comentario;
use App\Repositories\ComentarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ComentarioController
 * @package App\Http\Controllers\API
 */

class ComentarioAPIController extends AppBaseController
{
    /** @var  ComentarioRepository */
    private $comentarioRepository;

    public function __construct(ComentarioRepository $comentarioRepo)
    {
        $this->comentarioRepository = $comentarioRepo;
    }

    /**
     * Display a listing of the Comentario.
     * GET|HEAD /comentarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $comentarios = Comentario::all();
        return response()->json($comentarios);
    }

    /**
     * Store a newly created Comentario in storage.
     * POST /comentarios
     *
     * @param CreateComentarioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComentarioAPIRequest $request)
    {
        $data = $request->all();

        $validate = validator($data, $this->comentarioRepository->rules());
        if ( $validate->fails() ) {
            $messages = $validate->messages();
            return response()->json(['validate_error' => $messages], 422);
        }
        if (!$insert = $this->comentarioRepository->create($data) ) {
            return response()->json(['error' => 'error_insert'], 500);
        }

        return response()->json($insert , 201);
    }

    /**
     * Display the specified Comentario.
     * GET|HEAD /comentarios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comentario = Comentario::find($id);

        if(!$comentario) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($comentario);
    }

    /**
     * Update the specified Comentario in storage.
     * PUT/PATCH /comentarios/{id}
     *
     * @param  int $id
     * @param UpdateComentarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComentarioAPIRequest $request)
    {
        $data = $request->all();

        $validate = validator($data, $this->comentarioRepository->rules($id));
        if ( $validate->fails() ) {
            $messages = $validate->messages();
            return response()->json(['validate_error' => $messages], 422);
        }
        if( !$artigo = $this->comentarioRepository->find($id)) {
            return response()->json(['error' => 'comentario_not_found'], 404);
        }
        if ( !$update = $artigo->update($data) ) {
            return response()->json(['error' => 'comentario_not_update', 500]);
        }
        return response()->json($update, 200);
    }

    /**
     * Remove the specified Comentario from storage.
     * DELETE /comentarios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if( !$comentario = $this->comentarioRepository->find($id)) {
            return response()->json(['error' => 'comentario_not_found'], 404);
        }
        if ( !$delete = $comentario->delete() ) {
            return response()->json(['error' => 'comentario_not_delete', 500]);
        }
        return response()->json($delete);
    }
}
