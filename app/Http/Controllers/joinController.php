<?php

namespace App\Http\Controllers;


use App\City;
use App\ComeExam;
use App\Country;
use App\Healthstatus;
use App\Highschoolbranch;
use App\Http\Requests\BackEnd\Student\StoreRequest;
use App\Http\Requests\BackEnd\Student\UpdateRequest;
use App\Knowabout;
use App\Region;
use App\Regiontype;
use App\Religion;
use App\Schools;


use App\Socialstatus;
use App\Specialneed;
use Illuminate\Http\Request;
use App\Studenthighschool;
use App\Studentbridging;
use App\Studentpersonal;
use App\Studentacademic;
use App\Department;
use App\Major;
use App\Plan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class joinController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('student.join.index');

    }
//        $Healthstatus = Healthstatus::pluck('name', 'id');
//        $Religion = Religion::pluck('n ame', 'id');
//        $Country = Country::pluck('name_ar', 'id');
//        $Socialstatus = Socialstatus::pluck('name', 'id');
//        $City = City::pluck('name_ar', 'id');
//        $Region = Region::pluck('name_ar', 'id');
//        $Specialneed = Specialneed::pluck('name', 'id');
//        $Highschoolbranch = Highschoolbranch::pluck('name', 'id');
//        $Department = Department::where('active',1)->pluck('department_name', 'id');
//        $Knowabout = Knowabout::pluck('name', 'id');
//        return view('front-end.join.joinForm', compact('Healthstatus',
//                                                 'Religion',
//                                                 'Country',
//                                                 'Socialstatus',
//                                                 'City',
//                                                 'Region',
//                                                 'Specialneed',
//                                                 'Highschoolbranch',
//                                                 'Department',
//                                                 'Knowabout'));
//        return view('front-end.join.joinForm');
//    }

    /**
     * Show the form for creating a new resource.
     *
     *get the schools values from the table for the select input
     *
     * @return \Illuminate\Http\Response
     */
    public function showSchools($type)
    {
        $schools = Schools::where('Directorate', $type)->get();
        return response()->json($schools);
    }


    /**
     * Show the form for creating a new resource.
     *
     *get the regions values from the table for the select input
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegions($type)
    {
        $regions = Region::where('city_id', $type)->get();
        return response()->json($regions);
    }

    /*
     * get values from the tables for the select input un the form
     * */
    public function getSelectVariables()
    {
        $socialStatus = Socialstatus::all();
        $religions = Religion::all();
        $regiontypes = Regiontype::all();
        $regions = Region::all();
        $countries = Country::all();
        $cities = City::all();
        $healthstatus = Healthstatus::all();
        $specialneeds = Specialneed::all();
        $highschoolbranches = Highschoolbranch::all();
        $comExams = ComeExam::all();
        $departments = Department::all();
        $Knowabout = Knowabout::all();

        return [
            'socialStatus' => $socialStatus,
            'religions' => $religions,
            'regiontypes' => $regiontypes,
            'regions' => $regions,
            'countries' => $countries,
            'cities' => $cities,
            'healthstatus' => $healthstatus,
            'specialneeds' => $specialneeds,
            'highschoolbranches' => $highschoolbranches,
            'departments' => $departments,
            'comExams' => $comExams,
            'Knowabouts' => $Knowabout,
        ];
    }


    public function create()
    {

        //يتم توجيهه الى صفحةالتعديل اذا كان انشأ من قبل
        if (isset(auth()->user()->studentpersonal)) {

            return redirect(route('student.join.edit'));

        }

        //يتم توجيهه الى صفحة الانشاء مباشرة اذا لم يتم الانشاء من قبل
        return view('student.join.create')->with($this->getSelectVariables());
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(StoreRequest $request)
    {
        //upload image
        $request_data = $request->except(['image']);
        Image::make($request->image)->resize(250, 200)->save(public_path('images/students_photos/' . auth()->user()->id . '_' . $request->file('image')->getClientOriginalName()));
        $request_data['image'] = auth()->user()->id . '_' . $request->file('image')->getClientOriginalName();


        //fill the tables
        $request_data['student_id'] = auth()->user()->id;
        Studentpersonal::create($request_data);
        Studenthighschool::create($request_data);


        $department = $request->department_id;

        if ($request->input('isBridging') === 'checkBridging') {

            Studentbridging::create($request_data);

            $credit = Department::where('id', $department)->pluck('department_credit_tr')->first();

        } else {
            $credit = Department::where('id', $department)->pluck('department_credit_normal')->first();
        }

        $volunteer = Department::where('id', $department)->pluck('department_volunteer')->first();
        $major = Major::where('department_id', $department)->pluck('id')->first();
        $plan = Plan::where('major_id', $major)->where('active', 1)->max('id');

        //student id problem
        Studentacademic::create([
            'student_id' => auth()->user()->id,
            'graduation_id' => '21',
            'department_id' => $department,
            'major_id' => $major,
            'plan_id' => $plan,
            'departmentplan' => $plan, //its required to save it !!
            'credit_value' => $credit,
            'volunteer_hours' => $volunteer]);

        //save the email !!
        auth()->user()->update(['email' => $request->email]);


//        alert()->success('تم التسجيل بنجاح', 'Success');
        return redirect()->route('student.join.create');


    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //يتم توجيهه الى صفحةالcreate اذا كان لم ينشأ من قبل
        if (!(isset(auth()->user()->studentpersonal))) {

            return redirect(route('student.join.create'));

        }
        return view('student.join.edit')->with($this->getSelectVariables());
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

//        if  there is an image in the request
        $request_data = $request->all();

        if ($request->has('image')) {
            $request_data = $request->except(['image']);
            Storage::disk('public_uploads')->delete('/students_photos/' . auth()->user()->studentpersonal->image);
            Image::make($request->image)->resize(250, 200)->save(public_path('images/students_photos/' . auth()->user()->id . '_' . $request->file('image')->getClientOriginalName()));
            $request_data['image'] = auth()->user()->id . '_' . $request->file('image')->getClientOriginalName();

        }

        //update
        auth()->user()->studentpersonal->update($request_data);
        auth()->user()->studenthighschool->update($request_data);


        $department = $request->department_id;
        //check the bridging status and pluck the right credit based on his bridging status
        if ($request->input('isBridging') === 'checkBridging') {
            auth()->user()->studentbridging->update($request_data);
            $credit = Department::where('id', $department)->pluck('department_credit_tr')->first();

        } elseif (isset(auth()->user()->studentbridging)) {
            auth()->user()->studentbridging->delete();
            $credit = Department::where('id', $department)->pluck('department_credit_normal')->first();
        } else {
            $credit = Department::where('id', $department)->pluck('department_credit_normal')->first();
        }


        $volunteer = Department::where('id', $department)->pluck('department_volunteer')->first();
        $major = Major::where('department_id', $department)->pluck('id')->first();
        $plan = Plan::where('major_id', $major)->where('active', 1)->max('id');

        //problem on some required inputs
        auth()->user()->studentacademic->update([
            'student_id' => auth()->user()->id,
            'graduation_id' => '21',
            'department_id' => $department,
            'major_id' => $major,
            'plan_id' => $plan,
            'departmentplan' => $plan, //its required to save it !!
            'credit_value' => $credit,
            'volunteer_hours' => $volunteer
        ]);

        auth()->user()->update(['email' => $request->email]);


        alert()->success('تم التسجيل بنجاح', 'Success');
        return redirect()->route('student.join.create');


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
