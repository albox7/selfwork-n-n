<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


class PublicController extends Controller
{
	public function Home() {
		
		$articles = Article::latest()->get();
	
		return view('home', ['articles' => $articles]);
	}
}
