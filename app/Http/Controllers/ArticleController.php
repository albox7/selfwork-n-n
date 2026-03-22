<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class ArticleController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(ArticleRequest $request)
	{
		$imagePath = null;

		if($request->hasFile('image')) {
			$imagePath = $request->file('image')->store('media', 'public');
		}

		Article::create([
			'title' => $request->title,
			'subtitle' => $request->subtitle,
			'image' => $imagePath,
			'article' => $request->article,
		]);

		return redirect()->route('articles.create')->with('message', 'Post inserito!');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$article = Article::findOrFail($id);
		
		return view('articles.show', ['article' => $article]);
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		$article = Article::findOrFail($id);
		$tags = Tag::all();

		return view('articles.edit', [
			'article' => $article,
			'tags' => $tags,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		$article = Article::findOrFail($id);
		$imagePath = $article->image;

		if ($request->hasFile('image')) {
			Storage::disk('public')->delete($article->image);
			$imagePath = $request->file('image')->store('media', 'public');
		}

		$article->update([
			'title' => $request->title,
			'subtitle' => $request->subtitle,
			'image' => $imagePath,
			'article' => $request->article,
		]);

		$article->tags()->sync($request->tags ?? []);

		return redirect()->route('articles.show', $article->id)->with('message', 'Articolo aggiornato con successo!');
	}

}
