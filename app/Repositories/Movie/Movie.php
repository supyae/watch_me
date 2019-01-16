<?php

namespace App\Repositories\Movie;

use App\Repositories\Genre\Genre;
use App\Repositories\Schedule\Schedule;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected  $table = 'movie';

    protected $fillable = ['movie_name', 'actor', 'director', 'producer', 'genre_id', 'description', 'movie_img', 'trailer', 'release_date', 'bookopen_date'];

    public function schedule() {
        return $this->hasMany(Schedule::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
