<?php

namespace App\Http\Requests;

/**
 * Class BaseListRequest
 * @package App\Http\Requests
 */
abstract class BaseListRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'limit' => ['nullable', 'integer', 'required_with:offset'],
            'offset' => ['nullable', 'integer', 'required_with:limit'],
            'sort_by' => ['string', 'required_with:sort_direction'],
            'sort_direction' => ['string', 'in:asc,desc', 'required_with:sort_by'],
        ];
    }
}
