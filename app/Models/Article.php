<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'page_id', 'title', 'subtitle', 'content'
    ];

    public function page()
    {
    	return $this->belongsTo(Page::class);
    }
    public function image()
    {
    	return $this->belongsTo(Image::class);
    }
}
