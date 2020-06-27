<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseApiRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Auth
 */
final class LoginRequest extends BaseApiRequest
{

    /**
     * Get validation rules
     *
     * @return array|mixed
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ];
    }

}
