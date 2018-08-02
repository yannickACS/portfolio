<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];
    public function articles()
    {
    	return $this->hasMany(Article::class);
    }
    public function images()
	{
	    return $this->hasMany(Image::class);
	}
}
