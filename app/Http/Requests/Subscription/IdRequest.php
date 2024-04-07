<?php

namespace App\Http\Requests\Subscription;

use App\Http\Requests\Common\BaseRequest;

class IdRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'author_id' => 'required|int|exists:App\Models\User,id',
        ];
    }
}
