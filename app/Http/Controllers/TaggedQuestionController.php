<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;

class TaggedQuestionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Tag $tag)
    {
        $questions = QuestionResource::collection(
            $tag->questions()
                ->with('user')
                ->withCount('answers')
                ->latest()
                ->paginate(15)
                ->withQueryString()
        );
    
        return inertia('Questions/Index', [
            'questions' => $questions,
            'tag' => $tag
        ]);
    }
}
