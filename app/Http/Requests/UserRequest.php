<?php

namespace AizaBoutique\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'avatar'=>'mimes:jpeg,jpg,png,bmp',//asi aseguramos que lo que se suba sea una imagen y no otra cosa, si
            'name'=>'required',
            'email'=>'required',
            /*'password'=>'required',*/
            'country_user'=>'',
            'department_user'=>'',
            'city_user'=>'',
            'address_user'=>'',
            'birth_date_user'=>'',
            'year_birth_user'=>'',
            'sex'=>'',
            'lenguages'=>'',
            'religion'=>'',
            'family_name'=>'',
            'family_relationship'=>'',
            'company_name'=>'',
            'job_company'=>'',
            'city_company'=>'',
            'university_name'=>'',
            'time_frame_university'=>'',
            'completed_studies_university'=>'',
            'title_university'=>'',
            'school_name'=>'',
            'time_frame_school'=>'',
            'completed_studies_school'=>''
        ];
    }
}
