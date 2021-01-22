<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSantriAPIRequest;
use App\Http\Requests\API\UpdateSantriAPIRequest;
use App\Models\Santri;
use App\Repositories\SantriRepository;
use App\Repositories\OrangTuaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Str;
use DB;
/**
 * Class SantriController
 * @package App\Http\Controllers\API
 */

class SantriAPIController extends AppBaseController
{
    /** @var  SantriRepository */
    private $santriRepository;

    public function __construct(SantriRepository $santriRepo, OrangTuaRepository $orangTuaRepo)
    {
        $this->santriRepository = $santriRepo;
        $this->orangTuaRepository = $orangTuaRepo;
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
        // $santris = $this->santriRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );

        // return $this->sendResponse($santris->toArray(), 'Santris retrieved successfully');
        $santris = DB::table('santri')
            ->select('santri.id_santri as id', 'santri.*', 'orangtua.nama_ortu',
            'orangtua.alamat_ortu',
            'orangtua.pekerjaan_ortu',
            'orangtua.hp_ortu',
            // 'orangtua.create_date',
            // 'orangtua.last_update',
            // 'orangtua.soft_delete',
            'orangtua.nik',
            'orangtua.tgl_lahir_ortu')
            ->leftJoin('orangtua as orangtua', 'santri.id_orangtua', '=', 'orangtua.id_orangtua')
            ->where('santri.soft_delete', 0)
            ->get();

        return $this->sendResponse($santris->toArray(), 'Santri retrieved successfully');
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
        // var_dump($input);
        // die;
        $input['id_santri']=Str::uuid();
        $input['soft_delete']=0;
        $santri = $this->santriRepository->create($input);

        $input = $request->all('nama_ortu',
        'alamat_ortu',
        'pekerjaan_ortu',
        'hp_ortu',
        'create_date',
        'last_update',
        'soft_delete',
        'nik',
        'tgl_lahir_ortu');
        $input['id_orangtua']=Str::uuid();
        $input['soft_delete']=0;
        $orangTua = $this->OrangTuaRepository->create($input);

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

        $ortu = $request->all('nama_ortu',
        'alamat_ortu',
        'pekerjaan_ortu',
        'hp_ortu',
        'create_date',
        'last_update',
        'soft_delete',
        'nik',
        'tgl_lahir_ortu');

        $ortu2 = DB::table('santri')->where('id_santri', $id)->first();
        
        if ($ortu2->id_orangtua != null) {
            $ortu2 = $this->orangTuaRepository->update($ortu, $ortu2->id_orangtua);
        } else {
            $uuid=Str::uuid();
            $ortu['id_orangtua']=$uuid;
            $input['id_orangtua']=$uuid;
            $ortu['soft_delete']=0;
            $orangTua = $this->orangTuaRepository->create($ortu);
        }

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
