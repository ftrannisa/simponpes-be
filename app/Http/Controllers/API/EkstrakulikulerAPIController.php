<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEkstrakulikulerAPIRequest;
use App\Http\Requests\API\UpdateEkstrakulikulerAPIRequest;
use App\Models\Ekstrakulikuler;
use App\Repositories\EkstrakulikulerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Str;
use DB;

/**
 * Class EkstrakulikulerController
 * @package App\Http\Controllers\API
 */

class EkstrakulikulerAPIController extends AppBaseController
{
    /** @var  EkstrakulikulerRepository */
    private $ekstrakulikulerRepository;

    public function __construct(EkstrakulikulerRepository $ekstrakulikulerRepo)
    {
        $this->ekstrakulikulerRepository = $ekstrakulikulerRepo;
    }

    /**
     * Display a listing of the Ekstrakulikuler.
     * GET|HEAD /ekstrakulikulers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $ekstrakulikulers = $this->ekstrakulikulerRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );

        // return $this->sendResponse($ekstrakulikulers->toArray(), 'Ekstrakulikulers retrieved successfully');
        $ekstrakulikulers = DB::table('ekskul')
        ->select('ekskul.id_ekskul as id', 'ekskul.*')
        ->where('soft_delete', 0)
        ->get();

        return $this->sendResponse($ekstrakulikulers->toArray(), 'Ekskul retrieved successfully');
    }

    /**
     * Store a newly created Ekstrakulikuler in storage.
     * POST /ekstrakulikulers
     *
     * @param CreateEkstrakulikulerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEkstrakulikulerAPIRequest $request)
    {
        $input = $request->all();
        $input['id_ekskul']=Str::uuid();
        $input['soft_delete']=0;
        $ekstrakulikuler = $this->ekstrakulikulerRepository->create($input);

        return $this->sendResponse($ekstrakulikuler->toArray(), 'Ekstrakulikuler saved successfully');
    }

    /**
     * Display the specified Ekstrakulikuler.
     * GET|HEAD /ekstrakulikulers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ekstrakulikuler $ekstrakulikuler */
        $ekstrakulikuler = $this->ekstrakulikulerRepository->find($id);

        if (empty($ekstrakulikuler)) {
            return $this->sendError('Ekstrakulikuler not found');
        }

        return $this->sendResponse($ekstrakulikuler->toArray(), 'Ekstrakulikuler retrieved successfully');
    }

    /**
     * Update the specified Ekstrakulikuler in storage.
     * PUT/PATCH /ekstrakulikulers/{id}
     *
     * @param int $id
     * @param UpdateEkstrakulikulerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEkstrakulikulerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ekstrakulikuler $ekstrakulikuler */
        $ekstrakulikuler = $this->ekstrakulikulerRepository->find($id);

        if (empty($ekstrakulikuler)) {
            return $this->sendError('Ekstrakulikuler not found');
        }

        $ekstrakulikuler = $this->ekstrakulikulerRepository->update($input, $id);

        return $this->sendResponse($ekstrakulikuler->toArray(), 'Ekstrakulikuler updated successfully');
    }

    /**
     * Remove the specified Ekstrakulikuler from storage.
     * DELETE /ekstrakulikulers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ekstrakulikuler $ekstrakulikuler */
        $ekstrakulikuler = $this->ekstrakulikulerRepository->find($id);

        if (empty($ekstrakulikuler)) {
            return $this->sendError('Ekstrakulikuler not found');
        }

        $ekstrakulikuler->delete();

        return $this->sendSuccess('Ekstrakulikuler deleted successfully');
    }
}
