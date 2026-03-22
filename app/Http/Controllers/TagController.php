<?php

namespace App\Http\Controllers;
use App\Http\Requests\TagRequest;
use App\Models\Tag;


class TagController extends Controller
{
    public function create() {
        return view('tags.create');
    }

    public function store(TagRequest $request) {
        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tags.create')->with('message', 'Tag creato!');
    }
}
