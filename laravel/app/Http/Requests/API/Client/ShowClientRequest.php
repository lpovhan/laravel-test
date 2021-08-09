<?php

namespace App\Http\Requests\API\Client;

use InfyOm\Generator\Request\APIRequest;

class ShowClientRequest extends APIRequest
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

    public function validationData()
    {
        $keys = explode(',', key(parent::validationData()));
        request()->merge(['keys' => $keys]);
        return ['keys' => $keys];
    }

    /**
     * Get the validation rules that aply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'keys' => 'required|array',
            'keys.*' => 'required|string|max:255|exists:clients,key',
        ];
    }
}
