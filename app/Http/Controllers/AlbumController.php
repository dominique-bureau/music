<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Repositories\AlbumRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlbumController extends Controller {

    protected $albumRepository;

    public function __construct(AlbumRepository $albumRepository) {
        $this->albumRepository = $albumRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {
        try {
            $albums = $this->albumRepository->getAll($request->all());
            return response()->json($albums);
        } catch (\Exception $ex) {
            return response()->json(['Error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
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
     * @param  Album  $album
     * @return Response
     */
    public function show(Album $album) {
        try {
            $album = $this->albumRepository->getById($album->id);
            return response()->json($album);
        } catch (\Exception $ex) {
            return response()->json(['Error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Album  $album
     * @return Response
     */
    public function edit(Album $album) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Album  $album
     * @return Response
     */
    public function update(Request $request, Album $album) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Album  $album
     * @return Response
     */
    public function destroy(Album $album) {
        //
    }

}
