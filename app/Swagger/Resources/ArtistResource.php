<?php

/**
 * @OA\Schema(
 *     title="ArtistResource",
 *     description="Artist resource",
 *     @OA\Xml(
 *         name="ArtistResource"
 *     )
 * )
 */
class ArtistResource {

    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Swagger\Models\Artist
     */
    private $data;

}
