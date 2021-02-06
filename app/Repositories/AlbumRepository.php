<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Album;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AlbumRepository {

    public function getAll() {

        // return Album::with(['artist', 'band', 'songs'])->orderBy('name')->paginate(10);

        $albums = QueryBuilder::for(Album::class)
                ->allowedFilters([
                    AllowedFilter::partial('name'),
                    AllowedFilter::exact('band_id'),
                    AllowedFilter::exact('artist_id')
                ])
                ->allowedSorts(['name', 'release_date'])
                ->allowedFields(['albums.id', 'albums.name', 'albums.release_date', 'albums.band_id', 'albums.artist_id',
                    'artists.id', 'artists.name',
                    'bands.id', 'bands.name',
                    'songs.id', 'songs.name', 'songs.duration'])
                ->allowedIncludes(['band', 'artist', 'songs'])
                ->defaultSort('name');

        return $albums->paginate(10);
    }

    public function getById(string $id) {
        // return Album::with(['artist', 'band', 'songs'])->find($id);
        $album = QueryBuilder::for(Album::class)
                ->allowedFields(['albums.id', 'albums.name', 'albums.band_id', 'albums.artist_id', 'albums.release_date',
                    'artists.id', 'artists.name',
                    'bands.id', 'bands.name',
                    'songs.id', 'songs.name', 'songs.duration'])
                ->allowedIncludes(['band', 'artist', 'songs'])
                ->find($id);

        return $album;
    }

}
