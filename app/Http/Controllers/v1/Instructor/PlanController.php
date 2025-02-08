<?php
namespace App\Http\Controllers\v1\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the plans.
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.instructor.plans.index', compact('plans'));
    }

    public function JSONPlans()
    {
        try {
            $plans = Plan::all();
            return $plans;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while fetching plans: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new plan.
     */
    public function create()
    {
        return view('admin.instructor.plans.create');
    }

    public function begin()
{
    $plans = Plan::all();
    return view('home.landing', compact('plans'));
}

    /**
     * Store a newly created plan in the database.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'billing_cycle' => 'required|string',
        'features' => 'nullable|array', // Accepts an array input
    ]);

    Plan::create([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'billing_cycle' => $request->billing_cycle,
        'features' => json_encode($request->features), // Convert array to JSON
    ]);

    return redirect()->route('instructor.plans.index')->with('success', 'Plan created successfully!');
}


    /**
     * Show the form for editing the specified plan.
     */
    public function edit(Plan $plan)
    {
        return view('admin.instructor.plans.edit', compact('plan'));
    }

    /**
     * Update the specified plan in the database.
     */
    public function update(Request $request, Plan $plan)
    {
        $plan->update($request->all());

        return redirect()->route('instructor.plans.index')->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified plan from the database.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('instructor.plans.index')->with('success', 'Plan deleted successfully.');
    }
}
