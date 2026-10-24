<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');
        $query = Survey::with('room')->latest();

        if ($status && in_array($status, ['pending', 'confirmed', 'completed', 'cancelled'])) {
            $query->where('status', $status);
        }

        $surveys = $query->paginate(15);
        $counts = [
            'all' => Survey::count(),
            'pending' => Survey::where('status', 'pending')->count(),
            'confirmed' => Survey::where('status', 'confirmed')->count(),
            'completed' => Survey::where('status', 'completed')->count(),
        ];

        return view('admin.surveys.index', compact('surveys', 'counts', 'status'));
    }

    public function updateStatus(Request $request, Survey $survey)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $survey->update($validated);

        return redirect()->back()->with('success', 'Status pengajuan survey berhasil diperbarui!');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('admin.surveys.index')->with('success', 'Data survey berhasil dihapus!');
    }
}
