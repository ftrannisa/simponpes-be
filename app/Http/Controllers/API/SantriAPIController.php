<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSantriAPIRequest;
use App\Http\Requests\API\UpdateSantriAPIRequest;
use App\Models\Santri;
use App\Repositories\SantriRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SantriController
 * @package App\Http\Controllers\API
 */

class SantriAPIController extends AppBaseController
{
    /** @var  SantriRepository */
    private $santriRepository;

    public function __construct(SantriRepository $santriRepo)
    {
        $this->santriRepository = $santriRepo;
    }

    /**
     * Display a listing of the Santri.
     * GET|HEAD /santris
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $santris = $this->santriRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($santris->toArray(), 'Santris retrieved successfully');
        
    }

    /**
     * Store a newly created Santri in storage.
     * POST /santris
     *
     * @param CreateSantriAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSantriAPIRequest $request)
    {
        $input = $request->all();

        $santri = $this->santriRepository->create($input);

        return $this->sendResponse($santri->toArray(), 'Santri saved successfully');
    }

    /**
     * Display the specified Santri.
     * GET|HEAD /santris/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Santri $santri */
        $santri = $this->santriRepository->find($id);

        if (empty($santri)) {
            return $this->sendError('Santri not found');
        }

        return $this->sendResponse($santri->toArray(), 'Santri retrieved successfully');
    }

    /**
     * Update the specified Santri in storage.
     * PUT/PATCH /santris/{id}
     *
     * @param int $id
     * @param UpdateSantriAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSantriAPIRequest $request)
    {
        $input = $request->all();

        /** @var Santri $santri */
        $santri = $this->santriRepository->find($id);

        if (empty($santri)) {
            return $this->sendError('Santri not found');
        }

        $santri = $this->santriRepository->update($input, $id);

        return $this->sendResponse($santri->toArray(), 'Santri updated successfully');
    }

    /**
     * Remove the specified Santri from storage.
     * DELETE /santris/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Santri $santri */
        $santri = $this->santriRepository->find($id);

        if (empty($santri)) {
            return $this->sendError('Santri not found');
        }

        $santri->delete();

        return $this->sendSuccess('Santri deleted successfully');
    }
}
