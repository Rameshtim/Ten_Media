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
	
	 // public function create()
    // {

    //     return view('jobs.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
		$user = Auth::user();
		$data = $request->only([
			'title',
			'description',
			'company_id',
			'category_id',
		]);
		// $data['company_id'] = optional($user->company)->id;
		// $data['category_id'] = optional($user->category)->id;
		$job = Job::create($data);

		return redirect()->route('job.index', $job);
    }

	/* 
	use Illuminate\Support\Facades\Auth;

public function store(StoreJobRequest $request)
{
    // Assuming there is an authenticated user and a company relationship
    $user = Auth::user();

    $data = $request->only([
        'title',
        'description',
    ]);

    // Include the company_id in the data
    $data['company_id'] = $user->company->id;

    $job = Job::create($data);

    return redirect()->route('job.index', $job);
}

	*/
    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
