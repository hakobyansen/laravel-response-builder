<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use RB\Core\HttpStatusCodes;
use RB\Core\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Validation\Validator;

class RBRequest extends FormRequest
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
		return [];
	}


	/**
	 * @param Validator $Validator
	 */
	public function failedValidation( Validator $Validator )
	{
		$Response = new Response();

		$Response->setStatus( false );
		$Response->setStatusCode( HttpStatusCodes::UNPROCESSABLE_ENTITY );
		$Response->setMessage( Config::get( 'response_builder.messages.failed_validation' ) );
		$Response->setErrors( $Validator->getMessageBag()->toArray() );

		throw new HttpResponseException( $Response->getResponse() );
	}
}
