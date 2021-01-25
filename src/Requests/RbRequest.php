<?php

namespace App\Http\Requests\ResponseBuilder;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Rb\Core\ValidatorTrait;

class RbRequest extends FormRequest
{
    use ValidatorTrait;

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(): array
	{
		return [];
	}

	/**
	 * @param Validator $validator
	 */
	public function failedValidation( Validator $validator )
	{
		self::throwResponseException( $validator );
	}
}
