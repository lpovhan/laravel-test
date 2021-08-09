<?php

namespace App\Http\Requests\API\Client;

use InfyOm\Generator\Request\APIRequest;

class UpdateClientRequest extends APIRequest
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
        $data = array_map(function ($val) {
            return (is_numeric($val) ? (string) $val : $val);
        }, parent::validationData());
        return ['keys' => array_keys($data), 'values' => array_values($data)];
    }

    /**
     * Get the validation rules that aply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'keys' => 'array',
            'keys.*' => 'required|string|max:255|exists:clients,key',
            'values' => 'array',
            'values.*' => 'string|max:255',
        ];
    }
}
