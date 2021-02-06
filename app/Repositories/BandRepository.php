<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Band;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BandRepository {

    public function getAll() {

        // return Band::with('artists')->get();

        $bands = QueryBuilder::for(Band::class)
                ->allowedFilters([
                    AllowedFilter::partial('name'),
                    AllowedFilter::exact('creation_year')
                ])
                ->allowedSorts(['bands.name', 'creation_year'])
                ->allowedFields(['bands.id', 'bands.name', 'bands.creation_year',
                    'artists.id', 'artists.name'])
                ->allowedIncludes('artists')
                ->defaultSort('name');

        return $bands->paginate(10);
    }

    public function getById(string $id) {

        $band = QueryBuilder::for(Band::class)
                ->allowedFields(['id', 'name'])
                ->find($id);

        return $band;
    }

}
