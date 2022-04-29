<?php

namespace App\Http\Controllers;

use App\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodes = Episode::paginate(20)->toArray();
        // Formatear consulta
        $episodes['info'] = ['count' => $episodes['total'],
        'pages' => $episodes['last_page'], 
        'next' => $episodes['next_page_url'],
        'prev' => $episodes['prev_page_url'], 
        ];
        $episodes['results'] = $episodes['data'];
        unset($episodes['current_page']);
        unset($episodes['from']);
        unset($episodes['last_page']);
        unset($episodes['last_page_url']);
        unset($episodes['links']);
        unset($episodes['next_page_url']);
        unset($episodes['path']);
        unset($episodes['per_page']);
        unset($episodes['prev_page_url']);
        unset($episodes['to']);
        unset($episodes['total']);
        unset($episodes['first_page_url']);
        unset($episodes['data']);
        return json_encode($episodes );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $episode = Episode::create($request->all());
        return $episode;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        return $episode;        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {
        $episode->update($request->all());        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        $episode->delete();
        return response()->json();
    }
}
