<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Healthstatus;
use App\Http\Requests\BackEnd\Student\UpdateRequest;
use App\Region;
use App\Religion;
use App\Studentpersonal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.dashboard.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function showRegions($type)
    {
//        $dashboard='dashboard';
        $regions = Region::where('city_id', $type)->get();
        return response()->json($regions);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        $religions = Religion::all();
        $regions = Region::all();
        $countries = Country::all();
        $cities = City::all();
        $healthstatus = Healthstatus::all();


        return view('student.dashboard.edit')->with([
            'religions' => $religions,
            'regions' => $regions,
            'countries' => $countries,
            'cities' => $cities,
            'healthstatus' => $healthstatus
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        auth()->user()->studentpersonal->update($request->all());

        return redirect()->route('student.dashboard.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
