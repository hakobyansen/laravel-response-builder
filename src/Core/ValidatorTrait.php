<?php

namespace RB\Core;

trait ValidationTrait
{
    public static function fail()
    {
        $Response = new Response();

        $Response->setStatus( false );
        $Response->setStatusCode( HttpStatusCodes::UNPROCESSABLE_ENTITY );
        $Response->setMessage( Config::get( 'response_builder.messages.failed_validation' ) );
        $Response->setErrors( $Validator->getMessageBag()->toArray() );

        throw new HttpResponseException( $Response->getResponse() );
    }
}