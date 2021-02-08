<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class Lyric extends Model {

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

    public function song() {
        return $this->belongsTo(Song::class);
    }

}
