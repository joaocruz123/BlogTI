<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateArtigoAPIRequest;
use App\Http\Requests\API\UpdateArtigoAPIRequest;
use App\Models\Artigo;
use App\Repositories\ArtigoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ArtigoController
 * @package App\Http\Controllers\API
 */

class ArtigoAPIController extends AppBaseController
{
    /** @var  ArtigoRepository */
    private $artigoRepository;

    public function __construct(ArtigoRepository $artigoRepo)
    {
        $this->artigoRepository = $artigoRepo;
    }

    /**
     * Display a listing of the Artigo.
     * GET|HEAD /artigos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $artigos = Artigo::all();
        return response()->json($artigos);
    }

    /**
     * Store a newly created Artigo in storage.
     * POST /artigos
     *
     * @param CreateArtigoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateArtigoAPIRequest $request)
    {
        $data = $request->all();

        $validate = validator($data, $this->artigoRepository->rules());
        if ( $validate->fails() ) {
            $messages = $validate->messages();
            return response()->json(['validate_error' => $messages], 422);
        }
        if (!$insert = $this->artigoRepository->create($data) ) {
            return response()->json(['error' => 'error_insert'], 500);
        }

        return response()->json($insert , 201);
    }

    /**
     * Display the specified Artigo.
     * GET|HEAD /artigos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $artigo = Artigo::find($id);

        if(!$artigo) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($artigo);
    }

    /**
     * Update the specified Artigo in storage.
     * PUT/PATCH /artigos/{id}
     *
     * @param  int $id
     * @param UpdateArtigoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArtigoAPIRequest $request)
    {
        $data = $request->all();

        $validate = validator($data, $this->artigoRepository->rules($id));
        if ( $validate->fails() ) {
            $messages = $validate->messages();
            return response()->json(['validate_error' => $messages], 422);
        }
        if( !$artigo = $this->artigoRepository->find($id)) {
            return response()->json(['error' => 'artigo_not_found'], 404);
        }
        if ( !$update = $artigo->update($data) ) {
            return response()->json(['error' => 'artigo_not_update', 500]);
        }
        return response()->json($update, 200);
    }

    /**
     * Remove the specified Artigo from storage.
     * DELETE /artigos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if( !$artigo = $this->artigoRepository->find($id)) {
            return response()->json(['error' => 'artigo_not_found'], 404);
        }
        if ( !$delete = $artigo->delete() ) {
            return response()->json(['error' => 'artigo_not_delete', 500]);
        }
        return response()->json($delete);
    }
}
