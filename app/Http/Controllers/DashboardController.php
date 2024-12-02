<?php

namespace App\Http\Controllers;

use App\Models\ReadingTrack;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $weeks = ReadingTrack::where('user_id', auth()->id())
            ->select('week_number')
            ->distinct()
            ->orderByDesc('week_number') // Mengurutkan minggu terbaru di atas
            ->get();

        return view('dashboard', compact('weeks'));
    }
}
