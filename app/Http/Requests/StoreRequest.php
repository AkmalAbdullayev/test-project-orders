<?php

namespace App\Http\Requests;

use App\Enums\RequestEnum;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:requests,name'],
            'email' => ['required', 'string', 'email', 'unique:requests,email'],
            'status' => ['required', 'string', new Enum(RequestEnum::class)],
            'message' => ['required', 'string'],
            'comment' => [
                Rule::requiredIf($this->request->get('status') === RequestEnum::Resolved->value),
                Rule::excludeIf($this->request->get('status') !== RequestEnum::Resolved->value),
                'string'
            ]
        ];
    }

    /**
     * @throws HttpResponseException
     */
    public function failedValidation(Validator $validator): string
    {
        throw new HttpResponseException(
            response()->json([
                'data' => $validator->errors()
            ], 422)
        );
    }
}
