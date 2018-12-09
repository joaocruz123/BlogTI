<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateArtigoAPIRequest;
use App\Http\Requests\API\UpdateArtigoAPIRequest;
use App\Models\Artigo;
use App\Repositories\ArtigoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
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
        $this->artigoRepository->pushCriteria(new RequestCriteria($request));
        $this->artigoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $artigos = $this->artigoRepository->all();

        return $this->sendResponse($artigos->toArray(), 'Artigos retrieved successfully');
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
        $input = $request->all();

        $artigos = $this->artigoRepository->create($input);

        return $this->sendResponse($artigos->toArray(), 'Artigo saved successfully');
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
        /** @var Artigo $artigo */
        $artigo = $this->artigoRepository->findWithoutFail($id);

        if (empty($artigo)) {
            return $this->sendError('Artigo not found');
        }

        return $this->sendResponse($artigo->toArray(), 'Artigo retrieved successfully');
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
        $input = $request->all();

        /** @var Artigo $artigo */
        $artigo = $this->artigoRepository->findWithoutFail($id);

        if (empty($artigo)) {
            return $this->sendError('Artigo not found');
        }

        $artigo = $this->artigoRepository->update($input, $id);

        return $this->sendResponse($artigo->toArray(), 'Artigo updated successfully');
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
        /** @var Artigo $artigo */
        $artigo = $this->artigoRepository->findWithoutFail($id);

        if (empty($artigo)) {
            return $this->sendError('Artigo not found');
        }

        $artigo->delete();

        return $this->sendResponse($id, 'Artigo deleted successfully');
    }
}
