<?php

namespace App\Models\Music;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = '';

    public function songs()
    {
        return $this->hasMany(Song::class, 'category');
    }
}
