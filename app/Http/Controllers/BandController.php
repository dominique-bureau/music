<?php

namespace App\Http\Controllers;

use App\Http\Resources\BandResource;
use App\Models\Band;
use App\Repositories\BandRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BandController extends Controller {

    protected $bandRepository;

    public function __construct(BandRepository $bandRepository) {
        $this->bandRepository = $bandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {

        try {
            $bands = $this->bandRepository->getAll($request->all());
            // return response()->json($bands);
            return new BandResource($bands);
        } catch (Exception $ex) {
            return response()->json(['Error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Band  $band
     * @return Response
     */
    public function show(Band $band) {

        try {
            // $bandQuery = $this->bandRepository->getById($band->id);
            // return response()->json($band);
            return new BandResource($this->bandRepository->getById($band->id));
        } catch (Exception $ex) {
            return response()->json(['Error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Artist  $artist
     * @return Response
     */
    public function update(Request $request, Artist $artist) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Artist  $artist
     * @return Response
     */
    public function destroy(Artist $artist) {
        //
    }

}
