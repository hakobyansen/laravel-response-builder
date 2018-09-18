This is a simple package for Laravel framework to standardize the structure of JSON responses.
Package can work with any version of Laravel where `response()` helper is available.  

You will find this package helpful if you need your responses too look like:

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

### Installation  
`composer require codebot/response-builder`

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

`status` - boolean ( not nullable)  
`status code` - integer ( not nullable )  
`message` - string ( can be null )  
`data` - mixed ( can be null )  
`errors` - mixed (can be null )  
