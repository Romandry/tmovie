<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CommentValidator;

class CommentController extends Controller
{
    protected $limit = 3;

    /**
     * Display a listing of the resource.
     *
     * @param int $id_movie
     * @return JsonResponse
     */
    public function index(int $id_movie): JsonResponse
    {
        $data = Comment::with('movie')
            ->where('id_movie', $id_movie)
            ->paginate($this->limit);
        return response()->json([
            'data' => $data
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CommentValidator $request
     * @return JsonResponse
     */
    public function create(CommentValidator $request): JsonResponse
    {

        $comment = Comment::create([
            'id_user' => $request->id_user,
            'id_movie' => $request->id_movie,
            'text_comment' => $request->text_comment
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment created successfully',
            'data' => $comment
        ], Response::HTTP_OK);
    }
}
