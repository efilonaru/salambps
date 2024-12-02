<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ReadingTrack;

class UserManagementController extends Controller
{public function index()
    {
        $users = User::with(['readingTracks' => function ($query) {
            $query->orderBy('week_number', 'desc');
        }])->get();

        return view('admin.users.index', compact('users'));
    }

    // Assign juz ke user
    public function assignJuz(Request $request, User $user)
    {
        $request->validate([
            'juz' => 'required|integer|min:1|max:30',
        ]);

        // Tambahkan data ke tabel reading_tracks
        ReadingTrack::create([
            'user_id' => $user->id,
            'user_name' => $user->name, // Simpan nama meskipun user terhapus
            'week_number' => now()->weekOfYear,
            'juz' => $request->input('juz'),
            'completed_at' => null,
            'is_completed' => false,
        ]);

        return redirect()->route('admin.users')->with('success', "Juz {$request->juz} telah ditugaskan ke {$user->name}");
    }//
}
