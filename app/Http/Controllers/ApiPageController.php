<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Article;
use App\Models\Image;
use Illuminate\Http\Response;

class ApiPageController extends Controller
{
    public function showHomePage(){
        $page = Page::all()->where('slug', 'home');
        $pageId = $page[0]->id;
        $articles = Article::all()->where('page_id', $pageId);
        $images = Image::all()->where('page_id', $pageId);
        echo $images . '<br/>';
        die;
        return response($page->jsonSerialize(), Response::HTTP_CREATED);
    }
}
