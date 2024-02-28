<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('companies.index');
		$companies = Company::all();
		return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
		$data = $request->only([
			'name',
			'description',
		]);
		$company = Company::create($data);
		return redirect()->route('company.index', $company)->with('success', 'Firma erfolgreich gespeichert.');
    }
	
    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
		return view('companies.show', ['company' => $company]);
    }
	
    /**
	 * Show the form for editing the specified resource.
     */
	public function edit(Company $company)
    {
		return view('companies.edit', ['company' => $company]);
    }

    /**
	 * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
		$data = $request->only([
			'name',
			'description',
		]);
		$company->update($data);
		return redirect(route('company.index'))->with('success', 'Firma erfolgreich Aktualisiert.');
    }
	
    /**
	 * Remove the specified resource from storage.
     */
	public function destroy(Company $company)
    {
		$company->delete();
		return redirect(route('company.index'))->with('success', 'Firma erfolgreich gelöscht.');
    }
}
