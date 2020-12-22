<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUnitUsahaAPIRequest;
use App\Http\Requests\API\UpdateUnitUsahaAPIRequest;
use App\Models\UnitUsaha;
use App\Repositories\UnitUsahaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UnitUsahaController
 * @package App\Http\Controllers\API
 */

class UnitUsahaAPIController extends AppBaseController
{
    /** @var  UnitUsahaRepository */
    private $unitUsahaRepository;

    public function __construct(UnitUsahaRepository $unitUsahaRepo)
    {
        $this->unitUsahaRepository = $unitUsahaRepo;
    }

    /**
     * Display a listing of the UnitUsaha.
     * GET|HEAD /unitUsahas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $unitUsahas = $this->unitUsahaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($unitUsahas->toArray(), 'Unit Usahas retrieved successfully');
    }

    /**
     * Store a newly created UnitUsaha in storage.
     * POST /unitUsahas
     *
     * @param CreateUnitUsahaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUnitUsahaAPIRequest $request)
    {
        $input = $request->all();

        $unitUsaha = $this->unitUsahaRepository->create($input);

        return $this->sendResponse($unitUsaha->toArray(), 'Unit Usaha saved successfully');
    }

    /**
     * Display the specified UnitUsaha.
     * GET|HEAD /unitUsahas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UnitUsaha $unitUsaha */
        $unitUsaha = $this->unitUsahaRepository->find($id);

        if (empty($unitUsaha)) {
            return $this->sendError('Unit Usaha not found');
        }

        return $this->sendResponse($unitUsaha->toArray(), 'Unit Usaha retrieved successfully');
    }

    /**
     * Update the specified UnitUsaha in storage.
     * PUT/PATCH /unitUsahas/{id}
     *
     * @param int $id
     * @param UpdateUnitUsahaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnitUsahaAPIRequest $request)
    {
        $input = $request->all();

        /** @var UnitUsaha $unitUsaha */
        $unitUsaha = $this->unitUsahaRepository->find($id);

        if (empty($unitUsaha)) {
            return $this->sendError('Unit Usaha not found');
        }

        $unitUsaha = $this->unitUsahaRepository->update($input, $id);

        return $this->sendResponse($unitUsaha->toArray(), 'UnitUsaha updated successfully');
    }

    /**
     * Remove the specified UnitUsaha from storage.
     * DELETE /unitUsahas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UnitUsaha $unitUsaha */
        $unitUsaha = $this->unitUsahaRepository->find($id);

        if (empty($unitUsaha)) {
            return $this->sendError('Unit Usaha not found');
        }

        $unitUsaha->delete();

        return $this->sendSuccess('Unit Usaha deleted successfully');
    }
}
