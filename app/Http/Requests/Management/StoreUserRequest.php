<?php

namespace App\Http\Requests\Management;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => filled($this->name) ? str($this->name)->trim()->title()->toString() : null,
            'surname' => filled($this->surname) ? str($this->surname)->trim()->title()->toString() : null,
            'email' => filled($this->email) ? str($this->email)->trim()->lower()->toString() : null,
            'phone' => filled($this->phone) ? trim((string) $this->phone) : null,
            'fiscal_code' => filled($this->fiscal_code) ? str($this->fiscal_code)->trim()->upper()->toString() : null,
            'country' => filled($this->country) ? str($this->country)->trim()->title()->toString() : null,
            'province' => filled($this->province) ? str($this->province)->trim()->upper()->toString() : null,
            'city' => filled($this->city) ? str($this->city)->trim()->title()->toString() : null,
            'postal_code' => filled($this->postal_code) ? str($this->postal_code)->trim()->upper()->toString() : null,
            'address' => filled($this->address) ? str($this->address)->trim()->title()->toString() : null,
            'street_number' => filled($this->street_number) ? trim((string) $this->street_number) : null,
            'goal' => filled($this->goal) ? trim((string) $this->goal) : null,
            'notes' => filled($this->notes) ? trim((string) $this->notes) : null,
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'surname' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'nullable',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'phone' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^\+?[0-9\s().-\/]{7,20}$/'
            ],
            'fiscal_code' => [
                'nullable',
                'string',
                'size:16',
                'regex:/^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z][0-9]{3}[A-Z]$/',
                'unique:users,fiscal_code'
            ],
            'birth_date' => [
                'nullable',
                'date',
                'after:-120 years',
                'before:today'
            ],
            'gender' => [
                'nullable',
                'in:male,female,other,not_specified'
            ],
            'country' => [
                'nullable',
                'string',
                'max:255'
            ],
            'province' => [
                'nullable',
                'string',
                'max:2',
                'alpha'
            ],
            'city' => [
                'nullable',
                'string',
                'max:255'
            ],
            'postal_code' => [
                'nullable',
                'string',
                'min:3',
                'max:10',
                'regex:/^[a-zA-Z0-9\s\-]+$/'
            ],
            'address' => [
                'nullable',
                'string',
                'min:3',
                'max:255'
            ],
            'street_number' => [
                'nullable',
                'string',
                'max:20',
            ],
            'goal' => [
                'nullable',
                'string',
                'max:255'
            ],
            'notes' => [
                'nullable',
                'string',
                'max:1000'
            ]
        ];
    }
}
