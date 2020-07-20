<?php

namespace App\Http\Requests\Rb;

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
		return [];
	}

	/**
	 * @param Validator $Validator
	 */
	public function failedValidation( Validator $Validator )
	{
		self::throwResponseException( $Validator );
	}
}
