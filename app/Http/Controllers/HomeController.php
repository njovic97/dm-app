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

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.user.home.home');
    }

    public function getStatistics(Request $request)
    {
        $data = [];
        $employees = Employee::all()->count();
        $jobs = Job::all()->count();
        $prices = Price::all()->count();
        array_push($data, $employees, $jobs, $prices);
        return response()->json(['data' => $data]);
    }
}
