<?php

namespace App\Http\Requests\BackEnd\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'ssn' => 'required|numeric|digits:9|unique:studentpersonals,ssn, '.auth()->user()->id,
            'mobile' => 'required|digits:10',
            'mobile_2' => 'nullable|digits:10',
            'email' => 'required|email',
            'religion_id' => 'required',
            'nationality' => 'required',
            'socialstatus_id' =>'sometimes|required',
            //
            'first_name_en' => 'required|string',
            'second_name_en' => 'required|string|max:1|min:1',
            'third_name_en' => 'required|string|max:1|min:1',
            'fourth_name_en' => 'sometimes|required|string',
            'image' => 'nullable | image',
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
            'gender' => 'sometimes|required ',
            'healthstatus_id' => 'sometimes|required',
            'specialneed_id' => 'sometimes|required|numeric',
            'high_school_number' => 'sometimes|required|numeric',
            'highschoolbranch_id' => 'sometimes|required',
            'department_id' => 'sometimes|required',
            'knowabout_id' => 'sometimes|required',
            'conf' => 'sometimes|required',
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
}
