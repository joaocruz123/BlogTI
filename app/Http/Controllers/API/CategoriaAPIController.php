<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCategoriaAPIRequest;
use App\Http\Requests\API\UpdateCategoriaAPIRequest;
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
        $this->categoriaRepository->pushCriteria(new RequestCriteria($request));
        $this->categoriaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $categorias = $this->categoriaRepository->all();

        return $this->sendResponse($categorias->toArray(), 'Categorias retrieved successfully');
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
        $input = $request->all();

        $categorias = $this->categoriaRepository->create($input);

        return $this->sendResponse($categorias->toArray(), 'Categoria saved successfully');
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
        /** @var Categoria $categoria */
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            return $this->sendError('Categoria not found');
        }

        return $this->sendResponse($categoria->toArray(), 'Categoria retrieved successfully');
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
        $input = $request->all();

        /** @var Categoria $categoria */
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            return $this->sendError('Categoria not found');
        }

        $categoria = $this->categoriaRepository->update($input, $id);

        return $this->sendResponse($categoria->toArray(), 'Categoria updated successfully');
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
        /** @var Categoria $categoria */
        $categoria = $this->categoriaRepository->findWithoutFail($id);

        if (empty($categoria)) {
            return $this->sendError('Categoria not found');
        }

        $categoria->delete();

        return $this->sendResponse($id, 'Categoria deleted successfully');
    }
}
