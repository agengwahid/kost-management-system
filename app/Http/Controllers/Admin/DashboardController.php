<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Survey;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRooms = Room::count();
        $availableUnits = Room::where('is_available', true)->sum('available_units');
        $totalUnits = Room::sum('total_units');
        $pendingSurveys = Survey::where('status', 'pending')->count();
        $totalSurveys = Survey::count();

        $recentSurveys = Survey::with('room')->latest()->take(5)->get();
        $rooms = Room::all();
        $setting = Setting::current();

        return view('admin.dashboard', compact(
            'totalRooms',
            'availableUnits',
            'totalUnits',
            'pendingSurveys',
            'totalSurveys',
            'recentSurveys',
            'rooms',
            'setting'
        ));
    }
}
