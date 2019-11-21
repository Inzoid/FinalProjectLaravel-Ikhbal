<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->user;
        return [
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min: 8|confirmed',
            'tanggal_lahir' => 'required|before:17 years ago',
            'first_name' => 'required',
            'last_name'  => 'required'
        ];
    }

    public function message()
    {
        return[
            'tanggal_lahir.before' => 'Umur minimal 17 Tahun',
        ];
    }
}
