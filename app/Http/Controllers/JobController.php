<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Job; // Assuming you have a Job model
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use AuthorizesRequests;
    //@desc Show all job listings
    //route GET / jobs
    public function index(): View
    {
        $jobs = Job::latest()->paginate(9); // Fetch all job listings from the database
        return view('jobs.index')->with('jobs', $jobs);
    }

    //@desc Show create job form
    //route GET / jobs/create
    public function create(): View
    {
        return view('jobs.create');
    }

    //@desc Save job to database
    //route POST / jobs
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'contact_email' => 'required|string',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'required|string',
           'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
           'company_website' => 'nullable|url'
        ]);
    
        //Hardcoded user Id
        $validatedData['user_id'] = Auth::user()->id;

        //check for image
        if($request->hasFile('company_logo')){
            //store the file and get path
            $path = $request->file('company_logo')->store('logos', 'public');

            //add path to validate data
            $validatedData['company_logo'] = $path;
        }

       //submit to database 
       Job::create($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job listing created successfully!');
    }

    //@desc Display a single job listing
    //route GET / jobs/{$id}
    public function show(Job $job): view
    {
        return view('jobs.show')->with('job', $job);
    }

    //@desc Show edit job form
    //route GET /jobs/{$id}/edit
    public function edit(Job $job): View
    {
        //check if user is authorized
        $this->authorize('update', $job);
        
        return view('jobs.edit')->with('job', $job);
    }

    //@desc Update job listings
    //route PUT / jobs/{$id}
    public function update(Request $request, Job $job): string
    {
        //check if user is authorized
        $this->authorize('update', $job);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'contact_email' => 'required|string',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'required|string',
           'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
           'company_website' => 'nullable|url'
        ]);
    
        //check for image
        if ($request->hasFile('company_logo')){

            //Delete old logo
            Storage::delete('public/logos/' . basename($job->company_logo));

            //store the file and get path
            $path = $request->file('company_logo')->store('logos', 'public');

            //Add path to validated data
            $validatedData['company_logo'] = $path;
        }

        //submit to database 
        $job->update($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job listing updated successfully!');
    }

    //@desc Delete a job listing
    //route DELETE / jobs/{$id}
    public function destroy(Job $job): RedirectResponse
    {
        //check if user is authorized
        $this->authorize('delete', $job);
        //if logo then delee it.
        if($job->company_logo){
            Storage::delete('public/logos/' . $job->company_logo);
        }

        $job->delete();

        //Check if request came from the dashboard
        if(request()->query('from') == 'dashboard'){
            return redirect()->route('dashboard')->with('success', 'Job listing deleted successfully!');
        }

        return redirect()->route('jobs.index')->with('success', 'Job listing deleted successfully!');
    }
}
