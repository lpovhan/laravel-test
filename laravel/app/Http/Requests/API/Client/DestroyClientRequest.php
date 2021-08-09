<?php

namespace App\Http\Requests\API\Client;

use InfyOm\Generator\Request\APIRequest;

class DestroyClientRequest extends APIRequest
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
     * Get the validation rules that aply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'key' => 'required|string|max:255|exists:clients,key',
        ];
    }
}
