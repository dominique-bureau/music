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
     * @OA\Get(
     *      path="/artists",
     *      operationId="getArtistsList",
     *      tags={"Artists"},
     *      summary="Get list of artists",
     *      description="Returns list of artists",
     *      @OA\Parameter(
     *          name="page",
     *          description="Page number",
     *          required=false,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="fields[artist]",
     *          description="The available fields",
     *          required=false,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Artist")
     *          )
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
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
     * @OA\Get(
     *      path="/artists/{id}",
     *      operationId="getArtistById",
     *      tags={"Artists"},
     *      summary="Get artist information",
     *      description="Returns artist data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Artist id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string", format="uuid"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Artist")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
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
