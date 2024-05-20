<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $collection = User::query();

        $allowedFilterFields = (new User())->getFillable();
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
