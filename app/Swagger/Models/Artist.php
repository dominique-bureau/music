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
     *      description="Name of the artist (first and last name)",
     *      type="string",
     *      example="Tony BANKS"
     * )
     *
     * @var string
     */
    public $name;

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
