<?php

/**
 * @OA\Schema(
 *      title="StoreArtistRequest",
 *      description="Store Artist request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */
class StoreArtistRequest {

    /**
     * @OA\Property(
     *      title="First name of the new artist",
     *      description="First name of the new artist",
     *      example="Tony",
     *      type="string"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="Last name of the new artist",
     *      description="Last name of the new artist",
     *      example="BANKS",
     *      type="string"
     * )
     *
     * @var string
     */
    public $last_name;

    /**
     * @OA\Property(
     *     title="Birth date",
     *     description="Birth date of the new artist",
     *     example="1950-03-27",
     *     format="date",
     *     type="string"
     * )
     *
     * @var Date
     */
    private $birth_date;

    /**
     * @OA\Property(
     *     title="Death date",
     *     description="Death date of the new artist",
     *     example="",
     *     format="date",
     *     type="string"
     * )
     *
     * @var Date
     */
    private $death_date;

    /**
     * @OA\Property(
     *      title="Nationality",
     *      description="Nationality of the new artist",
     *      example="GB",
     *      type="string"
     * )
     *
     * @var string
     */
    public $nationality_id;

}
