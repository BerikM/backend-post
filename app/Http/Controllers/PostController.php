<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $collection = Post::query();

        $allowedFilterFields = (new Post())->getFillable();
        $allowedSortFields = ['id', ...$allowedFilterFields];
        $allowedSortDirections = ['asc', 'desc'];

        //?sortby=name&sortdir=desc
        $sortBy = $request->query('sortby', 'id');
        $sortDir = strtolower($request->query('sortdir', 'asc'));
        if(!in_array($sortBy, $allowedSortFields)) $sortBy = $allowedSortFields[0];
        if(!in_array($sortDir, $allowedSortDirections)) $sortBy = $allowedSortDirections[0];
        $collection->orderBy($sortBy, $sortDir);

        //?_name=John&_firstname=John&_lastname=Black
        foreach($allowedFilterFields as $key){
            if($paramFilter = $request->query('_'.$key)){
                $paramFilter = preg_replace("#([%_?+])#","\\$1",$paramFilter);
                $collection->where($key, 'LIKE', '%'.$paramFilter.'%');
            }
        }

        //?limit=20
        $limit = intval($request->query('limit', 20));
        //$limit = min($limit, 20);
        $collection->limit($limit);

        //?offset=0
        $offset = intval($request->query('offset', 0));
        $offset = max($offset, 0);
        $collection->offset($offset);

        return $collection->get();
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return response()->json(null, 204);
    }
}
