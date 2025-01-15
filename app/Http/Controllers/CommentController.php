<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'recipe_id' => $request->recipe_id,
        ]);

        return back()->with('success', 'Comment added successfully!');
    }
}
