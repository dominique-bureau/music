<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtistRequest;
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

    public function index(Request $request) {

        try {
            $artists = $this->artistRepository->getAll($request->all());
            return new ArtistResource($artists);
            // return response()->json($artists);
        } catch (\Exception $ex) {
            return response()->json(['Error' => $ex->getMessage()], 400);
        }
    }

    public function store(StoreArtistRequest $request) {

        try {
            $artist = $this->artistRepository->create($request->all());
            return new ArtistResource($artist);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 400);
        }
    }

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

    public function update(StoreArtistRequest $request, Artist $artist) {

        try {
            $updatedArtist = $this->artistRepository->update($artist, $request->all());
            return new ArtistResource($updatedArtist);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }

    public function destroy(Artist $artist) {

        try {
            $artist->delete();
            return response(null, 204);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }

}
