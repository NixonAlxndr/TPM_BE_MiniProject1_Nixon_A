<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mythtale extends Model
{
    use HasFactory;
    public $fillable = [
        'Title',
        'Summary',
        'Type',
        'CultureId'
    ];

    public function culture() : BelongsTo {
        return $this->belongsTo(Culture::class, 'CultureId');
    }
}
