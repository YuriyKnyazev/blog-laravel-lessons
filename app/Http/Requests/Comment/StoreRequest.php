<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\Common\BaseRequest;

class StoreRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'text' => 'required|string|max:4000',
            'post_id' => 'required|int|exists:\App\Models\Post,id',
            'comment_id' => 'nullable|int|exists:\App\Models\Comment,id',
            'user_id' => 'required|int'
        ];
    }
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {

        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }
}
