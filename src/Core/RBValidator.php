<?php

namespace RB\Core;

use Illuminate\Support\Facades\Validator;

class RBValidator
{
    use ValidatorTrait;

    /**
     * @param $data
     * @param $rules
     * @param $messages
     * @return true
     */
    public static function validate( $data, $rules, $messages = [] )
    {
        $Validator = Validator::make( $data, $rules, $messages );

        if( $Validator->fails() )
        {
            self::throwResponseException( $Validator );
        }

        return true;
    }
}