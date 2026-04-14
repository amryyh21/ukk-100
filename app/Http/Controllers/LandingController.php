<?php

namespace App\Http\Controllers;

use App\Models\Input_pengaduan;
use App\Models\Kategories;
use App\Models\User;

class LandingController extends Controller
{
    public function index()
    {
        $reports = Input_pengaduan::with(['user', 'kategori'])->latest()->get();
        $totalReports = $reports->count();
        $completedReports = $reports->where('status', '2')->count();

        return view('landing', [
            'totalReports' => $totalReports,
            'completionRate' => $totalReports > 0 ? round(($completedReports / $totalReports) * 100) : 0,
            'activeStudents' => User::where('level', 'siswa')->count(),
            'categoryCount' => Kategories::count(),
            'recentReports' => $reports->take(3),
        ]);
    }
}
