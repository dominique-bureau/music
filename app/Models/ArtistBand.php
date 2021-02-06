<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class ArtistBand extends Model {

    use HasFactory;

    /**
     * Generate an uuid for the key.
     */
    public static function boot(): void {
        parent::boot();
        self::creating(function ($model): void {
            $model->id = Uuid::uuid4()->toString();
            if (Auth::check()) {
                $model->created_by = Auth::user()->id;
            }
        });

        self::updating(function ($model): void {
            if (Auth::check()) {
                $model->updated_by = Auth::user()->id;
            }
        });
    }

    public $incrementing = false;
    protected $table = 'artist_band';
    protected $keyType = 'string';
    protected $hidden = [
        'created_by', 'updated_by', 'created_at', 'updated_at'
    ];

}
