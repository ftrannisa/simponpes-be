<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrangTuaAPIRequest;
use App\Http\Requests\API\UpdateOrangTuaAPIRequest;
use App\Models\OrangTua;
use App\Repositories\OrangTuaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Str;
use DB;

/**
 * Class OrangTuaController
 * @package App\Http\Controllers\API
 */

class OrangTuaAPIController extends AppBaseController
{
    /** @var  OrangTuaRepository */
    private $orangTuaRepository;

    public function __construct(OrangTuaRepository $orangTuaRepo)
    {
        $this->orangTuaRepository = $orangTuaRepo;
    }

    /**
     * Display a listing of the OrangTua.
     * GET|HEAD /orang_tuas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $orangTuas = $this->orangTuaRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );

        // return $this->sendResponse($orangTuas->toArray(), 'Orang Tuas retrieved successfully');
        $orangTuas = DB::table('orangtua')
        ->select('orangtua.id_orangtua as id', 'orangtua.*')
        ->where('soft_delete', 0)
        ->get();

        return $this->sendResponse($orangTuas->toArray(), 'orangtua retrieved successfully');
    }

    /**
     * Store a newly created OrangTua in storage.
     * POST /orang_tuas
     *
     * @param CreateOrangTuaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrangTuaAPIRequest $request)
    {
        $input = $request->all();
        $input['id_orangtua']=Str::uuid();
        $input['soft_delete']=0;
        $orangTua = $this->orangTuaRepository->create($input);

        return $this->sendResponse($orangTua->toArray(), 'Orang Tua saved successfully');
    }

    /**
     * Display the specified OrangTua.
     * GET|HEAD /orang_tuas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrangTua $orangTua */
        $orangTua = $this->orangTuaRepository->find($id);

        if (empty($orangTua)) {
            return $this->sendError('Orang Tua not found');
        }

        return $this->sendResponse($orangTua->toArray(), 'Orang Tua retrieved successfully');
    }

    /**
     * Update the specified OrangTua in storage.
     * PUT/PATCH /orang_tuas/{id}
     *
     * @param int $id
     * @param UpdateOrangTuaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrangTuaAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrangTua $orangTua */
        $orangTua = $this->orangTuaRepository->find($id);

        if (empty($orangTua)) {
            return $this->sendError('Orang Tua not found');
        }

        $orangTua = $this->orangTuaRepository->update($input, $id);

        return $this->sendResponse($orangTua->toArray(), 'OrangTua updated successfully');
    }

    /**
     * Remove the specified OrangTua from storage.
     * DELETE /orang_tuas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrangTua $orangTua */
        $orangTua = $this->orangTuaRepository->find($id);

        if (empty($orangTua)) {
            return $this->sendError('Orang Tua not found');
        }

        $orangTua->delete();

        return $this->sendSuccess('Orang Tua deleted successfully');
    }

    public function getNik(Request $request) 
    {
        $peran = DB::table('orangtua')
        ->select('orangtua.nik as nik', 'orangtua.*')
        ->where('nik', $request->nik)
        ->first();

        return $peran;
    }
}
