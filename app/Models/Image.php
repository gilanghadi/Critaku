<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'imageable_id', 'imageable_type', 'url',
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
