<?php

namespace Rb\Core;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Config;

trait ValidatorTrait
{
	/**
	 * @param Validator $validator
	 * @param string|null $errorCode
	 * @return mixed
	 */
    public static function throwResponseException(Validator $validator, ?string $errorCode ): mixed
    {
        $Response = new Response();

        $Response->setStatus( false );
        $Response->setStatusCode( HttpStatusCode::UNPROCESSABLE_ENTITY );
        $Response->setMessage( Config::get( 'response_builder.messages.failed_validation' ) );
        $Response->setErrors( $validator->getMessageBag()->toArray() );
		  $Response->setErrorCode( $errorCode );

        throw new HttpResponseException( $Response->getResponse() );
    }
}
