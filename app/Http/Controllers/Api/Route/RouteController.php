<?php

namespace App\Http\Controllers\Api\Route;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: validation / Auth
        try {
            $route = new Route;

            $route->name = $request->get('name');
            $route->from = $request->get('from');
            $route->to = $request->get('to');
            $route->range = $request->get('range');

            $route->save();

            return response()->json([
               'message' => 'The route was added succesfully',
               'route' => $route
            ]);
        }catch (\Exception $e){
            return response()->json(['error' => 'Something went wrong saving the route'], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Route $route)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        //
    }
}
