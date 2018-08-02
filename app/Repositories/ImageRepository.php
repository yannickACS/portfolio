<?php
namespace App\Repositories;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageRepository
{
	public function store($request)
	{
		// dd($request);
	    // Save image
	    $path = Storage::disk('images')->put('', $request->file('image'));
	    // Save thumb
	    $image = InterventionImage::make($request->file('image'))->widen(500);
	    Storage::disk('thumbs')->put($path, $image->encode());
	    // Save in base
	    $image = new Image;
	    $image->page_id= $request->page;
	    $image->article_id = $request->article;
	    $image->url = $path;
	    $image->save();
	}
}