<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReadingTrack;

class ReadingTrackController extends Controller
{
    public function index()
{
    $weeks = ReadingTrack::where('user_id', auth()->user())
                ->groupBy('week_number')
                ->get(['week_number']);
    
    return view('reading_tracks.index', compact('weeks'));
}

public function show($week)
{
    $tracks = ReadingTrack::where('user_id', auth()->id())
                ->where('week_number', $week)
                ->get();
    
    return view('reading_tracks.show', compact('tracks'));
}

}
