<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateUserRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,id,' . $this->request->get('user_id'),
            'password' => 'nullable|string|confirmed',
            'phone' => 'nullable|string|min:9',
            'address' => 'nullable|string|max:1000',
            'avatar' => 'image',
        ];
    }
}
