<?php

namespace App\Http\Requests\EventMembers;

use App\Http\Requests\BaseApiRequest;

/**
 * Class CreateEventMemberRequest
 * @package App\Http\Requests\EventMembers
 */
final class CreateEventMemberRequest extends BaseApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
        ];
    }

}
