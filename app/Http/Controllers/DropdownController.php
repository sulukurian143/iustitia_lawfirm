<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function index()
	{
    $countries = DB::table("countries")->pluck("name","id");
        return view('admin.add_student',compact('countries'));
    }

    public function getStateList(Request $request)
    {
        $states = DB::table("states")
        ->where("country_id",$request->country_id)
        ->pluck("name","id");
        return response()->json($states);
    }

    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
        ->where("state_id",$request->state_id)
        ->pluck("name","id");
        return response()->json($cities);
    }
}
