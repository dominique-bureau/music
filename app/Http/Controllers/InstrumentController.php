<?php

namespace App\Http\Controllers;

use App\Http\Resources\InstrumentResource;
use App\Models\Instrument;
use App\Repositories\InstrumentRepository;
use Illuminate\Http\Request;

class InstrumentController extends Controller {

    protected $instrumentRepository;

    public function __construct(InstrumentRepository $instrumentRepository) {
        $this->instrumentRepository = $instrumentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {
            $instruments = $this->instrumentRepository->getAll();
            return new InstrumentResource($instruments);
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
     * @param  Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function show(Instrument $instrument) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrument $instrument) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instrument $instrument) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrument $instrument) {
        //
    }

}
