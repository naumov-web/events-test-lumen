<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;
use Illuminate\Contracts\Validation\Validator as IValidator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\UnauthorizedException;

/**
 * Class BaseApiRequest
 * @package App\Http\Requests
 */
abstract class BaseApiRequest extends FormRequest
{

    /**
     * Validate request data
     *
     * @return array|void
     */
    public function validate ()
    {
        if (false === $this->authorize()) {
            throw new UnauthorizedException();
        }

        $validator = Validator::make(
            $this->all(),
            $this->rules(),
            $this->messages()
        );

        if ($validator->fails()) {
            $this->failedValidation($validator);
        }
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  IValidator  $validator
     * @return void
     */
    protected function failedValidation(IValidator $validator): void
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'errors' => $errors
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    /**
     * Get default rules
     *
     * @return array|mixed
     */
    public function rules()
    {
        return [];
    }

    /**
     * Get default error messages
     *
     * @return array|mixed
     */
    public function messages()
    {
        return [];
    }
}
