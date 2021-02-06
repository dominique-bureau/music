<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class Album extends Model {

    use HasFactory;

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
    protected $keyType = 'string';
    protected $hidden = [
        'created_by', 'updated_by', 'created_at', 'updated_at'
    ];

    public function band() {
        return $this->belongsTo(Band::class);
    }

    public function artist() {
        return $this->belongsTo(Artist::class);
    }

    public function songs() {
        return $this->hasMany(Song::class)->orderBy('position');
    }

}
