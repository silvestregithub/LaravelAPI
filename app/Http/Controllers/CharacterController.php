<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::paginate(20)->toArray();
        // Formatear consulta
        $characters['info'] = ['count' => $characters['total'],
        'pages' => $characters['last_page'], 
        'next' => $characters['next_page_url'],
        'prev' => $characters['prev_page_url'], 
        ];
        $characters['results'] = $characters['data'];
        unset($characters['current_page']);
        unset($characters['from']);
        unset($characters['last_page']);
        unset($characters['last_page_url']);
        unset($characters['links']);
        unset($characters['next_page_url']);
        unset($characters['path']);
        unset($characters['per_page']);
        unset($characters['prev_page_url']);
        unset($characters['to']);
        unset($characters['total']);
        unset($characters['first_page_url']);
        unset($characters['data']);
        return json_encode($characters );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $character = Character::create($request->all());
        return $character;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        return $character;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        $character->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return response()->json();
    }
}
