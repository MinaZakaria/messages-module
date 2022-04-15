<?php

namespace App\Http\Requests\Messages;

use App\Http\Requests\ApplicationRequest;

class SendMessageRequest extends ApplicationRequest
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
        return [
            'receiverId' => 'required|int|exists:users,id',
            'content' => 'required|string|max:1000'
        ];
    }
}
