<?php

/**
 * @OA\Schema(
 *     title="Artist",
 *     description="Artist model"
 * )
 */
class Artist {

    /**
     * @OA\Property(
     *     title="Id",
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
     *      title="First name",
     *
     *      type="string",
     *      example="Tony"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="Last name",
     *
     *      type="string",
     *      example="BANKS"
     * )
     *
     * @var string
     */
    public $last_name;

    /**
     * @OA\Property(
     *      title="Birth date",
     *      example="1950-03-27"
     * )
     *
     * @var string
     */
    public $birth_date;

    /**
     * @OA\Property(
     *      title="Death date",
     *      example="null"
     * )
     *
     * @var string
     */
    public $death_date;

    /**
     * @OA\Property(
     *      title="Nationality",
     *      example="GB"
     * )
     *
     * @var string
     */
    public $nationality_id;

}
