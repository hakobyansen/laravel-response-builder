## About
Package `codebot/laravel-response-builder` is a simple package for Laravel framework to standardize the structure of JSON responses.

You will find this package helpful if you need your responses too look like this:

```json
{
  "status": true,
  "message": "You got that!",
  "data" : {
    "user": {
      "name": "James Joesph Bulger",
      "profession": "criminal"
    }
  },
  "errors": null
}
```

or

```json
{
  "status": false,
  "message": "Something went wrong...",
  "data" : null,
  "errors": {
    "email": [
      "The email field is required."
    ]
  }
}
```

## Installation  
`composer require codebot/response-builder:0.1.*`

**For Laravel 5.4 and versions below add `\RB\Core\RBServiceProvider::class` to providers in config/app.php file.**

Next run `php artisan vendor:publish --tag=laravel-response-builder` command in your console.

### Usage  
```php
$response = new \RB\Core\Response();

$response->setStatus( true ); // required

$response->setStatusCode( \RB\Core\HttpStatusCodes::OK ); // required

$response->setMessage( 'Some inspiring message.' ); // null will be returned if no message set

$response->setData( $data ); // null will be returned if no data set

$response->setErrors( $errors ); // null will be returned if no error set

$response->getArray(); // will return an array of data set

$response->getResponse(); // will return a json response using Laravel's response() helper 
```

All setters are fluent, so example above could be written like:
```php
$response = new \RB\Core\Response();

$response->setStatus( true )
    ->setStatusCode( \RB\Core\HttpStatusCodes::OK )
    ->setMessage( 'Some inspiring message.' ); 
    // ...
```

Package contains HttpStatusCodes class with http status codes defined.

```php
use \RB\Core\HttpStatusCodes;

HttpStatusCodes::OK; // returns status code 200 (integer)

HttpStatusCodes::getMessageByCode( \RB\Core\HttpStatusCodes::OK::NOT_FOUND ); // returns string "Not Found"

HttpStatusCodes::getCodeWithMessage( \RB\Core\HttpStatusCodes::OK::CREATED ); // returns string - code and message, e.g. "201 Created"
```

### Fields

`status` - boolean ( Not Nullable )  
`status code` - integer ( Not Nullable )  
`message` - string ( Nullable )  
`data` - mixed ( Nullable )  
`errors` - mixed ( Nullable )  
