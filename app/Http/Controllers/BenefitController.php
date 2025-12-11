<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\BenefitDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'active');

        $benefits = Benefit::where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('benefits.index', compact('benefits', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:benefits,name',
            // date is optional in the form now (we use created_at or now() as fallback)
            'date' => 'nullable|date',
            'details' => 'required|array|min:1',
            'details.*.salary_rate_from' => 'required|numeric',
            'details.*.salary_rate_to' => 'required|numeric',
            'details.*.employer_share' => 'required|numeric',
            'details.*.employee_share' => 'required|numeric',
            'details.*.employer_share_type' => 'required|string',
            'details.*.employee_share_type' => 'required|string',
        ]);

        DB::transaction(function () use ($request) {
            // prefer explicit date field, fallback to created_at input or now()
            $dateValue = $request->date ?? $request->created_at ?? now();

            $benefit = Benefit::create([
                'name' => $request->name,
                'date' => $dateValue,
                'created_by' => auth()->id(),
            ]);

            foreach ($request->details as $detail) {
                $benefit->details()->create([
                    'salary_rate_from' => $detail['salary_rate_from'],
                    'salary_rate_to' => $detail['salary_rate_to'],
                    'employer_share' => $detail['employer_share'],
                    'employee_share' => $detail['employee_share'],
                    'employer_share_type' => $detail['employer_share_type'],
                    'employee_share_type' => $detail['employee_share_type'],
                ]);
            }
        });

        return back()->with('success', 'Benefit added successfully!');
    }

    public function edit(Benefit $benefit)
    {
        $benefit->load('details');
        return response()->json($benefit);
    }

    public function update(Request $request, Benefit $benefit)
    {
        $request->validate([
            'name' => 'required|unique:benefits,name,' . $benefit->id,
            'date' => 'nullable|date',
            'details' => 'required|array|min:1',
            'details.*.salary_rate_from' => 'required|numeric',
            'details.*.salary_rate_to' => 'required|numeric',
            'details.*.employer_share' => 'required|numeric',
            'details.*.employee_share' => 'required|numeric',
            'details.*.employer_share_type' => 'required|string',
            'details.*.employee_share_type' => 'required|string',
        ]);

        DB::transaction(function () use ($request, $benefit) {
            $dateValue = $request->date ?? $request->created_at ?? $benefit->date ?? now();

            $benefit->update([
                'name' => $request->name,
                'date' => $dateValue,
            ]);

            // remove existing details and recreate (simpler sync)
            $benefit->details()->delete();

            foreach ($request->details as $detail) {
                $benefit->details()->create([
                    'salary_rate_from' => $detail['salary_rate_from'],
                    'salary_rate_to' => $detail['salary_rate_to'],
                    'employer_share' => $detail['employer_share'],
                    'employee_share' => $detail['employee_share'],
                    'employer_share_type' => $detail['employer_share_type'],
                    'employee_share_type' => $detail['employee_share_type'],
                ]);
            }
        });

        return back()->with('success', 'Benefit updated successfully!');
    }

    public function destroy(Benefit $benefit)
    {
        $benefit->delete();
        return back()->with('success', 'Benefit deleted permanently!');
    }

    public function archive(Benefit $benefit)
    {
        $benefit->update(['status' => 'archived']);
        return back()->with('success', 'Benefit archived!');
    }

    public function restore(Benefit $benefit)
    {
        $benefit->update(['status' => 'active']);
        return back()->with('success', 'Benefit restored!');
    }
}
