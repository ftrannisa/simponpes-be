<?php

namespace App\Http\Requests\API;

use App\Models\OrangTua;
use InfyOm\Generator\Request\APIRequest;

class UpdateOrangTuaAPIRequest extends APIRequest
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
        $rules = OrangTua::$rules;
        
        return $rules;
    }
}
