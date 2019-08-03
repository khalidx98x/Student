<?php

namespace App\Http\Requests\BackEnd\Student;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    public function rules()
    {

        $rules = [
            'ssn' => 'required|numeric|digits:9|unique:studentpersonals,ssn, ' . auth()->user()->id,
            'mobile' => 'required|digits:10',
            'mobile_2' => 'nullable|digits:10',
            'email' => 'required|email',
            'religion_id' => 'required',
            'nationality' => 'required',
            'socialstatus_id' => 'required',
            //
            'first_name_en' => 'required|string',
            'second_name_en' => 'required|string|max:1|min:1',
            'third_name_en' => 'required|string|max:1|min:1',
            'fourth_name_en' => 'required|string',
            'image' => 'required | image',
            //
            'country_id' => 'required ',
            'dob' => 'required|date',
            'home_phone' => 'required|digits:7',
            'guardian' => 'required ',
            'guardian_type' => 'required',
            'guardian_mobile' => 'required|digits:10',
            'city_id' => 'required',
            'region_id' => 'required ',
            'street' => 'required ',
            'gender' => 'required ',
            'healthstatus_id' => 'required',
            'specialneed_id' => 'required|numeric',
            'high_school_number' => 'required|numeric',
            'highschoolbranch_id' => 'required',
            'department_id' => 'required',
            'knowabout_id' => 'required',
            'conf' => 'required',
//            Bridging rules
            'university_name' => 'required_if:isBridging,checkBridging',
            'college' => 'required_if:isBridging,checkBridging',
            'department' => 'required_if:isBridging,checkBridging',
            'graduate_year' => 'required_if:isBridging,checkBridging',
            'gpa' => 'required_if:isBridging,checkBridging',
            'com_exam' => 'required_if:isBridging,checkBridging'

        ];


        return $rules;
    }

//    public function messages()
//    {
//
//        return [
//
//            'ssn.required ',
//            'mobile.required ',
//            'email.required ',
//            'religion_id.required ',
//            'nationality.required ',
//            'socialstatus_id.required ',
//            'first_name_en.required ',
//            'second_name_en.required ',
//            'third_name_en.required ',
//            'fourth_name_en.required ',
//            'country_id.required ',
//
//            'dob.required ',
//            'home_phone.required ',
//            'guardian.required ',
//            'guardian_type.required ',
//            'guardian_mobile.required ',
//            'city_id.required ',
//            'region_id.required ',
//            'street.required ',
//            'gender.required ',
//            'healthstatus_id.required ',
//            'specialneed_id.required ',
//            'high_school_number.required ',
//            'highschoolbranch_id.required ',
//            'department_id.required ',
//            'knowabout_id.required ',
//            'conf.required ',
//            'university_name.required ',
//            'college.required ',
//            'department.required ',
//            'graduate_year.required',
//
//            'gpa.required ',
//            'com_exam.required '
//        ];
//    }
}
