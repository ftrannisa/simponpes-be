<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProfilePonpesAPIRequest;
use App\Http\Requests\API\UpdateProfilePonpesAPIRequest;
use App\Models\ProfilePonpes;
use App\Repositories\ProfilePonpesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProfilePonpesController
 * @package App\Http\Controllers\API
 */

class ProfilePonpesAPIController extends AppBaseController
{
    /** @var  ProfilePonpesRepository */
    private $profilePonpesRepository;

    public function __construct(ProfilePonpesRepository $profilePonpesRepo)
    {
        $this->profilePonpesRepository = $profilePonpesRepo;
    }

    /**
     * Display a listing of the ProfilePonpes.
     * GET|HEAD /profilePonpes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $profilePonpes = $this->profilePonpesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($profilePonpes->toArray(), 'Profile Ponpes retrieved successfully');
    }

    /**
     * Store a newly created ProfilePonpes in storage.
     * POST /profilePonpes
     *
     * @param CreateProfilePonpesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProfilePonpesAPIRequest $request)
    {
        $input = $request->all();

        $profilePonpes = $this->profilePonpesRepository->create($input);

        return $this->sendResponse($profilePonpes->toArray(), 'Profile Ponpes saved successfully');
    }

    /**
     * Display the specified ProfilePonpes.
     * GET|HEAD /profilePonpes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProfilePonpes $profilePonpes */
        $profilePonpes = $this->profilePonpesRepository->find($id);

        if (empty($profilePonpes)) {
            return $this->sendError('Profile Ponpes not found');
        }

        return $this->sendResponse($profilePonpes->toArray(), 'Profile Ponpes retrieved successfully');
    }

    /**
     * Update the specified ProfilePonpes in storage.
     * PUT/PATCH /profilePonpes/{id}
     *
     * @param int $id
     * @param UpdateProfilePonpesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfilePonpesAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProfilePonpes $profilePonpes */
        $profilePonpes = $this->profilePonpesRepository->find($id);

        if (empty($profilePonpes)) {
            return $this->sendError('Profile Ponpes not found');
        }

        $profilePonpes = $this->profilePonpesRepository->update($input, $id);

        return $this->sendResponse($profilePonpes->toArray(), 'ProfilePonpes updated successfully');
    }

    /**
     * Remove the specified ProfilePonpes from storage.
     * DELETE /profilePonpes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProfilePonpes $profilePonpes */
        $profilePonpes = $this->profilePonpesRepository->find($id);

        if (empty($profilePonpes)) {
            return $this->sendError('Profile Ponpes not found');
        }

        $profilePonpes->delete();

        return $this->sendSuccess('Profile Ponpes deleted successfully');
    }
}
