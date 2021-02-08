<?php

class ArtistController {
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
    /**
     * @OA\Post(
     *      path="/artists",
     *      operationId="storeArtist",
     *      tags={"Artists"},
     *      summary="Store a new artist",
     *      description="Store new artist",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreArtistRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
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
    /**
     * @OA\Put(
     *      path="/artists/{id}",
     *      operationId="updateArtist",
     *      tags={"Artists"},
     *      summary="Update existing artist",
     *      description="Returns updated artist data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Artist id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string", format="uuid"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreArtistRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    /**
     * @OA\Delete(
     *      path="/artists/{id}",
     *      operationId="deleteArtist",
     *      tags={"Artists"},
     *      summary="Delete existing artist",
     *      description="Deletes an artist and returns no content",
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
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
}
