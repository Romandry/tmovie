<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MovieValidator;

class MovieController extends Controller
{
    protected $limit = 3;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = Movie::paginate($this->limit);
        return response()->json([
            'data' => $data
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param MovieValidator $request
     * @return JsonResponse
     */
    public function create(MovieValidator $request): JsonResponse
    {
        // Only superUser can do it
        if(!User::isSuperuser()) {
            return response()->json([
                'message' => 'You have not an access to this action'
            ], Response::HTTP_SERVICE_UNAVAILABLE);
        }

        $movie = Movie::create([
            'name_movie' => $request->name_movie,
            'cover_url' => $request->cover_url,
            'video' => $request->video
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Movie created successfully',
            'data' => $movie
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        if($this->user()){
            $data = Movie::findOrFail($id);
        }else {
            $data = Movie::findOrFail($id)->makeHidden(['video']);
        }

        return response()->json([
            'data' => $data
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MovieValidator $request
     * @param int $id_movie
     * @return JsonResponse
     */
    public function update(MovieValidator $request, int $id_movie): JsonResponse
    {
        // Only superUser can do it
        if(!User::isSuperuser()) {
            return response()->json([
                'message' => 'You have not an access to this action'
            ], Response::HTTP_SERVICE_UNAVAILABLE);
        }

        $movie = Movie::findOrFail($id_movie);

        $movie = $movie->update([
            'name_movie' => $request->name_movie,
            'cover_url' => $request->cover_url,
            'video' => $request->video
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Movie updated successfully',
            'data' => $movie
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id_movie
     * @return JsonResponse
     */
    public function destroy(int $id_movie): JsonResponse
    {
        // Only superUser can do it
        if(!User::isSuperuser()) {
            return response()->json([
                'message' => 'You have not an access to this action'
            ], Response::HTTP_SERVICE_UNAVAILABLE);
        }

        $movie = Movie::findOrFail($id_movie);
        $movie->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], Response::HTTP_OK);
    }
}
