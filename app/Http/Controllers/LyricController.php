<?php

namespace App\Http\Controllers;

use App\Http\Resources\LyricResource;
use App\Models\Lyric;
use App\Repositories\LyricRepository;
use Illuminate\Http\Request;
use function response;

class LyricController extends Controller {

    protected $lyricRepository;

    public function __construct(LyricRepository $lyricRepository) {
        $this->lyricRepository = $lyricRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {
            $lyrics = $this->lyricRepository->getAll();
            return new LyricResource($lyrics);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Lyric  $lyric
     * @return \Illuminate\Http\Response
     */
    public function show(Lyric $lyric) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Lyric  $lyric
     * @return \Illuminate\Http\Response
     */
    public function edit(Lyric $lyric) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Lyric  $lyric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lyric $lyric) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Lyric  $lyric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lyric $lyric) {
        //
    }

}
