<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Lyric;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class LyricRepository {

    public function getAll() {

        $lyrics = QueryBuilder::for(Lyric::class)
                ->allowedFilters([
                    AllowedFilter::partial('name'),
                    AllowedFilter::exact('song_id')
                ])
                ->allowedFields(['songs.id', 'songs.name', 'songs.duration', 'songs.position', 'songs.album_id',
                    'lyrics.id', 'lyrics.lyrics'])
                ->allowedIncludes(['song']);

        return $lyrics->paginate(10);
    }

    public function getById(string $id) {

        $lyric = QueryBuilder::for(Lyric::class)
                ->allowedFields(['songs.id', 'songs.name', 'songs.duration', 'songs.position', 'songs.album_id',
                    'lyrics.id', 'lyrics.lyrics'])
                ->allowedIncludes(['song'])
                ->find($id);

        return $lyric;
    }

}
