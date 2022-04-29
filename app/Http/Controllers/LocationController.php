<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::paginate(20)->toArray();
        // Formatear consulta
        $locations['info'] = ['count' => $locations['total'],
        'pages' => $locations['last_page'], 
        'next' => $locations['next_page_url'],
        'prev' => $locations['prev_page_url'], 
        ];
        $locations['results'] = $locations['data'];
        unset($locations['current_page']);
        unset($locations['from']);
        unset($locations['last_page']);
        unset($locations['last_page_url']);
        unset($locations['links']);
        unset($locations['next_page_url']);
        unset($locations['path']);
        unset($locations['per_page']);
        unset($locations['prev_page_url']);
        unset($locations['to']);
        unset($locations['total']);
        unset($locations['first_page_url']);
        unset($locations['data']);
        return json_encode($locations );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = Location::create($request->all());
        return $location;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return $location;        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $location->update($request->all());        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return response()->json();
    }
}
