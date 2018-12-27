<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCategoriaAPIRequest;
use App\Http\Requests\API\UpdateCategoriaAPIRequest;
use App\Http\Requests\CreateArtigoRequest;
use App\Models\Artigo;
use App\Models\Categoria;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CategoriaController
 * @package App\Http\Controllers\API
 */

class CategoriaAPIController extends AppBaseController
{
    /** @var  CategoriaRepository */
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepo)
    {
        $this->categoriaRepository = $categoriaRepo;
        //$this->middleware('auth');
        //$this->middleware('auth', ['only' => 'store','update','destroy']);
    }

    /**
     * Display a listing of the Categoria.
     * GET|HEAD /categorias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    /**
     * Store a newly created Categoria in storage.
     * POST /categorias
     *
     * @param CreateCategoriaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaAPIRequest $request)
    {
        $data = $request->all();

        $validate = validator($data, $this->categoriaRepository->rules());
        if ( $validate->fails() ) {
            $messages = $validate->messages();
            return response()->json(['validate_error' => $messages], 422);
        }
        if (!$insert = $this->categoriaRepository->create($data) ) {
            return response()->json(['error' => 'error_insert'], 500);
        }

        return response()->json($insert, 201);
    }

    /**
     * Display the specified Categoria.
     * GET|HEAD /categorias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        if(!$categoria) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($categoria);
    }

    /**
     * Update the specified Categoria in storage.
     * PUT/PATCH /categorias/{id}
     *
     * @param  int $id
     * @param UpdateCategoriaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaAPIRequest $request)
    {
        $data = $request->all();
        $validate = validator($data, $this->categoriaRepository->rules($id));
        if ( $validate->fails() ) {
            $messages = $validate->messages();
            return response()->json(['validate_error' => $messages], 422);
        }
        if( !$categoria = $this->categoriaRepository->find($id)) {
            //dd("sadsadasd");
            return response()->json(['error' => 'categoria_not_found'], 404);
        }
        if ( !$update = $categoria->update($data) ) {
            return response()->json(['error' => 'categoria_not_update', 500]);
        }
        return response()->json($update, 200);
    }

    /**
     * Remove the specified Categoria from storage.
     * DELETE /categorias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if( !$artigo = $this->categoriaRepository->find($id)) {
            return response()->json(['error' => 'ccategoria_not_found'], 404);
        }
        if ( !$delete = $artigo->delete() ) {
            return response()->json(['error' => 'categoria_not_delete', 500]);
        }
        return response()->json($delete);
    }
}
