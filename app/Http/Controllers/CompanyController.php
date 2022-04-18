<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = new Company;

        $this->storeOrUpdate($request, $company);

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $this->storeOrUpdate($request, $company);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index');
    }

    /**
     * Store or update the company record
     * 
     * @param  \App\Http\Requests\StoreCompanyRequest|UpdateCompanyRequest  $request
     * @param  \App\Models\Company  &$company
     */
    protected function storeOrUpdate(StoreCompanyRequest|UpdateCompanyRequest $request, Company &$company)
    {
        // https://laravel.com/docs/9.x/validation#creating-form-requests "how are the validation rules evaluated? All you need to do is type-hint the request on your controller method. The incoming form request is validated before the controller method is called"
        
        // Retrieves ONLY the validated input data(unlike $request->all() which gets other stuff too like hidden inputs and stuff)
        $validated = $request->validated();

        $company->name = $validated['name'];
        $company->email = $validated['email'];
        $company->website = $validated['website'];
        if($request->hasFile('logo')) { // or you can use "if(!empty($validated['logo']))" but this is better            
            // for update(): delete old logo if it exists
            if($company->logo) Storage::delete($company->logo);
            
            // upload new logo and store its path in the database            
            $path = $validated['logo']->store('companies/logos'); // $validated['logo'] <=> $request->file('logo')
            $company->logo = $path;
        }

        $company->save();
    }
}
