<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;



class IncidentRequest extends FormRequest

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
            'site_id' => 'required',
            'category_id' => 'required',
            'asset_id' => 'required',
            'failure_reason' => 'required',
            'required_spares' => 'required',
            'process_work' => 'required',
            'idate' => 'required'

        ];

    }

}

