<?php

/**
 * @OA\Schema(
 *     title="Band",
 *     description="Band model"
 * )
 */
class Band {

    /**
     * @OA\Property(
     *     title="Id",
     *     description="Id",
     *     type="string",
     *     format="uuid",
     *     example="f5d3101b-de3a-4778-8f6d-90479534c2e5"
     * )
     *
     * @var string
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the band",
     *      type="string",
     *      example="GENESIS"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Creation yeay",
     *      example="1969"
     * )
     *
     * @var string
     */
    public $creation_year;

}
