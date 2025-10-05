<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user')?->id;

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'password' => $this->isMethod('post') 
                ? 'required|string|min:6' 
                : 'nullable|string|min:6',
        ];
    }
    
    protected function prepareForValidation()
    {
        if ($this->filled('password')) {
            $this->merge([
                'password' => bcrypt($this->password)
            ]);
        }
    }
}
