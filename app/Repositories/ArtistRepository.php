<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Artist;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ArtistRepository {

    public function getAll(array $request) {

        $artists = QueryBuilder::for(Artist::class)
                ->allowedFilters([
                    AllowedFilter::partial('name'),
                    AllowedFilter::exact('nationality_id')
                ])
                ->allowedSorts(['name', 'nationality_id', 'birth_date'])
                ->allowedFields(['id', 'name', 'birth_date', 'death_date', 'nationality_id'])
                ->defaultSort('name');

        return $artists->paginate(10);
    }

    public function getById(string $id) {

        $artist = QueryBuilder::for(Artist::class)
                ->allowedFields(['id', 'name', 'birth_date', 'death_date', 'nationality_id'])
                ->find($id);

        return $artist;
    }

}
