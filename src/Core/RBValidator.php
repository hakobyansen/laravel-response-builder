<?php
namespace RB\Core;

use Validator;

class RBValidator
{
    use ValidationTrait;
    
    public static function validate( $data, $rules, $messages )
    {
        $Validator = Validator::make( $data, $rules, $messages );

        if( $Validator->fails() )
        {
            self::fail( $Validator );
        }
    }
}