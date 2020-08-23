<?php

namespace Rb\Core;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Config;

trait ValidatorTrait
{
    /**
     * @param Validator $Validator
     */
    public static function throwResponseException( Validator $Validator )
    {
        $Response = new Response();

        $Response->setStatus( false );
        $Response->setStatusCode( HttpStatusCode::UNPROCESSABLE_ENTITY );
        $Response->setMessage( Config::get( 'response_builder.messages.failed_validation' ) );
        $Response->setErrors( $Validator->getMessageBag()->toArray() );

        throw new HttpResponseException( $Response->getResponse() );
    }
}
