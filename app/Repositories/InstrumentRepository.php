<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Instrument;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class InstrumentRepository {

    public function getAll() {

        $instruments = QueryBuilder::for(Instrument::class)
                ->allowedFilters([
                    AllowedFilter::partial('name')
                ])
                ->allowedSorts(['name'])
                ->allowedFields(['instruments.id', 'instruments.name',
                    'artists.id', 'artists.last_name', 'artists.first_name'])
                ->allowedIncludes(['artists'])
                ->defaultSort('name');

        return $instruments->paginate(10);
    }

    public function getById(string $id) {

        $instrument = QueryBuilder::for(Instrument::class)
                ->allowedFields(['instruments.id', 'instruments.name',
                    'artists.id', 'artists.name'])
                ->allowedIncludes(['artists'])
                ->find($id);

        return $instrument;
    }

}
