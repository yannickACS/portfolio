<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'page_id', 'article_id'
    ];
    public function article()
    {
    	return $this->belongsTo(Article::class);
    }
    public function page()
    {
    	return $this->belongsTo(Page::class);
    }
}
