<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Song;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SongRepository {

    public function getAll() {

        // return Song::with(['album'])->orderBy('position')->paginate(10);

        $songs = QueryBuilder::for(Song::class)
                ->allowedFilters([
                    AllowedFilter::partial('name'),
                    AllowedFilter::exact('album_id')
                ])
                ->allowedSorts(['name', 'duration', 'position'])
                ->allowedFields(['songs.id', 'songs.name', 'songs.duration', 'songs.position', 'songs.album_id',
                    'albums.id', 'albums.name'])
                ->allowedIncludes(['album'])
                ->defaultSort('position');

        return $songs->paginate(10);
    }

    public function getById(string $id) {

        $song = QueryBuilder::for(Song::class)
                ->allowedFields(['songs.id', 'songs.name', 'songs.duration', 'songs.position', 'songs.album_id',
                    'albums.id', 'albums.name'])
                ->allowedIncludes(['album'])
                ->find($id);

        return $song;
    }

}
