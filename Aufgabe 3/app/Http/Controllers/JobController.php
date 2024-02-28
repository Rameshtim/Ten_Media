<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$jobs = Job::all();
		return view('jobs.index', ['jobs' => $jobs]);
        // return view('jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
	public function create()
	{
		$companies = Company::all(); // Fetch all companies from the database
		$categories = Category::all(); // Fetch all companies from the database
		return view('jobs.create', compact('companies', 'categories'));
	}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
		// $user = Auth::user();
		$data = $request->only([
			'title',
			'description',
			'company_id',
			'category_id',
		]);
		
		$job = Job::create($data);
		
		return redirect()->route('job.index', $job)->with('success', 'Job ist gespeichert');
    }
	
    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
		$companies = Company::all();
		$categories = Category::all();
        return view('jobs.edit', compact('job', 'companies', 'categories'));
    }
	
    /**
	 * Update the specified resource in storage.
     */
	public function update(UpdateJobRequest $request, Job $job)
    {
		$data = $request->only([
			'title',
			'description',
			'company_id',
			'category_id',
		]);
		$job->update($data);
		return redirect(route('job.index'))->with('success', 'Job wurde Aktualisiert');
        
    }

    /**
	 * Remove the specified resource from storage.
     */
	public function destroy(Job $job)
    {
		$job->delete();
		return redirect(route('job.index'))->with('success', 'Job wurde Aktualisiert');
    }
}
