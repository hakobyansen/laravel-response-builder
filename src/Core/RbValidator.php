<?php

namespace Rb\Core;

use Illuminate\Contracts\Validation\Validator;

class RbValidator
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
