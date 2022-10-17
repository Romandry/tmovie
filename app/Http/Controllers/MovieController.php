<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends Controller
{
    protected $limit = 3;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = Movie::paginate($this->limit);
        return response()->json([
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        // Only superUser can do it
        if(!User::isSuperuser()) {
            return response()->json([
                'message' => 'You have not an access to this action'
            ], 503);
        }

        //Validate data
        $data = $request->only('name_movie', 'cover_url', 'video');
        $validator = Validator::make($data, [
            'name_movie' => 'required|string',
            'cover_url' => 'required|string',
            'video' => 'required|string'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new movie
        $movie = Movie::create([
            'name_movie' => $request->name_movie,
            'cover_url' => $request->cover_url,
            'video' => $request->video
        ]);

        //Movie created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Movie created successfully',
            'data' => $movie
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return JsonResponse
     */
    public function show(Movie $movie, int $id): JsonResponse
    {
        if($this->user()){
            $data = Movie::findOrFail($id);
        }else {
            $data = Movie::findOrFail($id)->makeHidden(['video']);
        }

        return response()->json([
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id_movie
     * @return JsonResponse
     */
    public function update(Request $request, int $id_movie): JsonResponse
    {
        // Only superUser can do it
        if(!User::isSuperuser()) {
            return response()->json([
                'message' => 'You have not an access to this action'
            ], 503);
        }

        $movie = Movie::findOrFail($id_movie);

        //Validate data
        $data = $request->only('name_movie', 'cover_url', 'video');
        $validator = Validator::make($data, [
            'name_movie' => 'required|string',
            'cover_url' => 'required|string',
            'video' => 'required|string'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update movie
        $movie = $movie->update([
            'name_movie' => $request->name_movie,
            'cover_url' => $request->cover_url,
            'video' => $request->video
        ]);

        //Movie updated, return success response
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
            ], 503);
        }

        $movie = Movie::findOrFail($id_movie);
        $movie->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], Response::HTTP_OK);
    }
}
