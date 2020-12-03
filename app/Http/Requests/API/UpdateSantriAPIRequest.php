<?php

namespace App\Http\Requests\API;

use App\Models\Santri;
use InfyOm\Generator\Request\APIRequest;

class UpdateSantriAPIRequest extends APIRequest
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
        $rules = Santri::$rules;
        
        return $rules;
    }
}
