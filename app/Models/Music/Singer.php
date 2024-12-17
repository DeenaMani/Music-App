<?php

namespace App\Models\Music;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $table = 'singers';
    protected $guarded = '';

    public function songs()
    {
        return $this->hasMany(Song::class, 'singer');
    }
}
