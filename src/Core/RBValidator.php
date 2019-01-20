<?php

namespace RB\Core;

use Illuminate\Validation\Validator;

class RBValidator
{
    use ValidatorTrait;

    /**
     * @param Validator $validator
     * @return bool
     */
    public static function validate( Validator $validator ): bool
    {
        if( $validator->fails() )
        {
            self::throwResponseException( $validator );
        }

        return true;
    }
}