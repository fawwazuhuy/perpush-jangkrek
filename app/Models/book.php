<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'author_id',
        'publisher_id',
        'title',
        'cover',
        'year'
    ];

    public function author()
    {
        return $this->belongsTo(author::class);
    }
    public function publisher()
    {
        return $this->belongsTo(publisher::class);
    }
}
