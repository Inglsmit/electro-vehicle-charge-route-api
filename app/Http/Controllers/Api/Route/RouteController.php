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
               'message' => 'The route was added successfully',
               'route' => $route
            ], 200);
        }catch (\Exception $e){
            logger('Error in RouteController.store', [$e->getMessage()]);
            return response()->json(['error' => 'Something went wrong saving the route'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $route = Route::findOrFail($id);
            $route->delete();

            return response()->json(['success' => 'The route was deleted successfully'], 200);
        }catch (\Exception $e){
            logger('Error in RouteController.destroy', [$e->getMessage()]);
            return response()->json(['error' => 'Something went wrong deleting the saved route'], 400);
        }
    }
}
