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
                    AllowedFilter::partial('last_name'),
                    AllowedFilter::exact('nationality_id')
                ])
                ->allowedSorts(['last_name', 'first_name', 'nationality_id', 'birth_date'])
                ->allowedFields(['id', 'last_name', 'first_name', 'birth_date', 'death_date', 'nationality_id',
                    'instruments.id', 'instruments.name'])
                ->allowedIncludes(['instruments', 'bands'])
                ->defaultSort('last_name');

        return $artists->paginate(10);
    }

    public function getById(string $id) {

        $artist = QueryBuilder::for(Artist::class)
                ->allowedFields(['id', 'last_name', 'first_name', 'birth_date', 'death_date', 'nationality_id'])
                ->find($id);

        return $artist;
    }

    public function create(array $data): Artist {
        $artist = new Artist();
        $artist->fill($data);
        $artist->save();

        return $artist;
    }

    public function update(Artist $artist, array $data): Artist {
        $artist->fill($data);
        $artist->save();

        return $artist;
    }

}
