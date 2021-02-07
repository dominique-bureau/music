<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtistResource;
use App\Models\Artist;
use App\Repositories\ArtistRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function response;

class ArtistController extends Controller {

    protected $artistRepository;

    public function __construct(ArtistRepository $artistRepository) {
        $this->artistRepository = $artistRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {

        try {
            $artists = $this->artistRepository->getAll($request->all());
            return new ArtistResource($artists);
            // return response()->json($artists);
        } catch (\Exception $ex) {
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
     * @param  Artist  $artist
     * @return Response
     */
    public function show(Artist $artist) {

        try {
            $artist = $this->artistRepository->getById($artist->id);
            // return response()->json($artist);
            return new ArtistResource($artist);
        } catch (Exception $ex) {
            return response()->json(['Error' => $ex->getMessage()], 400);
        }

        return response()->json($artist);
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
