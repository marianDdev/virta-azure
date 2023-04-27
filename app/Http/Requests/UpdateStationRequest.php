<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_id' => ['nullable', 'integer', Rule::exists(Company::class, 'id')],
            'name'       => ['nullable', 'string', 'max:256'],
            'latitude'   => ['nullable', 'numeric', 'between:-90,90'],
            'longitude'  => ['nullable', 'numeric', 'between:-180,180'],
            'address'    => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'company_id.exists' => 'Parent company id must be an existing company id.',
            'latitude.between'  => 'Latitude must be a value between -90 and 90',
            'longitude.between' => 'Longitude mus be a value between -180 and 180',
        ];

    }
}
