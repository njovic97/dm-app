<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Price;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        return view('pages.user.prices.prices', compact('prices'));
    }

    public function getEmployeeOptions()
    {
        $employees = Employee::all();
        $html = '';
        foreach ($employees as $employee) {
            $html = $html . '<option value="' . $employee->id . '">' . $employee->first_name . ' ' . $employee->last_name . '</option>';
        }
        return response()->json(['emp_options' => $html]);
    }

    public function createPrice(Request $request)
    {
        $price = new Price();
        $price->employee_id = $request->employee_id;
        $price->per_hour = $request->per_hour;
        $price->fixed = $request->fixed;
        $price->save();
    }

    public function getPriceInfoForEdit(Request $request)
    {
        $price = Price::where('id', $request->price_id)->first();
        return response()->json(['price' => $price]);
    }

    public function editPrice(Request $request)
    {
        $price = Price::where('id', $request->price_id)->first();
        if ($price instanceof Price) {
            $price->employee_id = $request->employee_id;
            $price->per_hour = $request->per_hour;
            $price->fixed = $request->fixed;
            $price->save();
        }
    }

    public function deletePrice(Request $request)
    {
        $price = Price::where('id', $request->price_id)->first();
        if ($price instanceof Price) {
            $price->delete();
        }
    }

}
