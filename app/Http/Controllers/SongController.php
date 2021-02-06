<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Repositories\SongRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SongController extends Controller {

    protected $songRepository;

    public function __construct(SongRepository $songRepository) {
        $this->songRepository = $songRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {
            $songs = $this->songRepository->getAll();
            return response()->json($songs);
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
     * @param  Song  $song
     * @return Response
     */
    public function show(Song $song) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Song  $song
     * @return Response
     */
    public function edit(Song $song) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Song  $song
     * @return Response
     */
    public function update(Request $request, Song $song) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Song  $song
     * @return Response
     */
    public function destroy(Song $song) {
        //
    }

}
