<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Culture extends Model
{
    use HasFactory;
    public $fillable = [
        'Name',
        'Region'
    ];

    public function Mythtale() : HasMany{
        return $this->hasMany(Mythtale::class, 'CultureId');
    }
}
