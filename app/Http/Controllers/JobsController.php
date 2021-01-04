<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Job;
use App\Models\Price;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('pages.user.jobs.jobs', compact('jobs'));
    }

    public function deleteJob(Request $request)
    {
        $job = Job::where('id', $request->job_id)->first();
        if ($job instanceof Job) {
            $job->delete();
        }
    }

    public function getEmployeeOptions(Request $request)
    {
        $employees = Employee::all();
        $html = '';
        foreach ($employees as $employee) {
            $html = $html . '<option value="' . $employee->id . '">' . $employee->first_name . ' ' . $employee->last_name . '</option>';
        }
        return response()->json(['emp_options' => $html]);
    }

    public function getPricesOptions(Request $request)
    {
        $prices = Price::where('employee_id', $request->employee_id)->get();
        $html = '';
        foreach ($prices as $price) {
            $html = $html . '<option value="' . $price->id . '">' . $price->fixed . '</option>';
        }
        return response()->json(['prices_options' => $html]);
    }

    public function createJob(Request $request)
    {
        $job = new Job();
        $job->employee_id = $request->employee_id;
        $job->price_id = $request->price_id;
        $job->title = $request->title;
        $job->due_date = $request->due_date;
        $job->status = $request->status;
        $job->contact = $request->contact;
        $job->save();
    }

    public function getJobInfo(Request $request)
    {
        $job = Job::where('id', $request->job_id)->first();
        $due_date = $job->due_date->format('m/d/Y');
        return response()->json(['job' => $job, 'due_date' => $due_date]);
    }

    public function editJob(Request $request)
    {
        $job = Job::where('id', $request->job_id)->first();
        if ($job instanceof Job) {
            $job->employee_id = $request->employee_id;
            $job->price_id = $request->price_id;
            $job->title = $request->title;
            $job->due_date = $request->due_date;
            $job->status = $request->status;
            $job->contact = $request->contact;
            $job->save();
        }
    }
}
