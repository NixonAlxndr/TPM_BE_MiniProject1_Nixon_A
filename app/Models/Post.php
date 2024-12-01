<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'AuthorId';
    protected $fillable = [
        "Title",
        "AuthorName",
        "Image",
        "Description",
        "CategoryId"
    ];

    public function category(){
        return $this->belongsTo(Category::class, "CategoryId");
    }
}
