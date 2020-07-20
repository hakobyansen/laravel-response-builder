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
`composer require codebot/laravel-response-builder:0.2.*`

**For Laravel 5.4 and versions below add `\Rb\Core\RbServiceProvider::class` to providers in config/app.php file.**

Next run `php artisan vendor:publish --tag=laravel-response-builder` command in your console.

## Requests

Once you published vendor, you should see `App\Http\Requests\Rb\RbRequest class`. This will be base class for
laravel-response-builder's requests.  
To generate a request that extends RbRequest, do:
  
`php artisan make:rbrequest YourNewRequest` 

If you are using Laravel's Validator class, you can use `Rb\Core\RbValidator` to standardize the structure of failed response. 

```php
$validator = new Validator( $data, $rules ); // assuming you have a $validator instance

\Rb\Core\RbValidator::validate( $validator ); // throws HttpResponseException or returns boolean true
 
```

RbValidator::validate() method checks if the validation fails and throws Illuminate\Http\Exceptions\HttpResponseException with the standardized json response structure.

### Usage  
```php
$response = new \Rb\Core\Response();

$response->setStatusCode( \Rb\Core\HttpStatusCode::OK ); // required. If code is 2XX then Response::status field will be "true", otherwise "false"

$response->setMessage( 'Some inspiring message.' ); // null will be returned if no message set

$response->setData( $data ); // null will be returned if no data set

$response->setErrors( $errors ); // null will be returned if no error set

$response->getArray(); // will return an array of data set

$response->getResponse(); // will return a json response using Laravel's response() helper 
```

All setters are fluent, so example above could be written like:
```php
$response = new \Rb\Core\Response();

$response->setStatusCode( \Rb\Core\HttpStatusCode::OK )
    ->setMessage( 'Some inspiring message.' ); 
    // ...
```

Package contains HttpStatusCode class with http status codes defined.

```php
use \Rb\Core\HttpStatusCode;

HttpStatusCode::OK; // returns status code 200 (integer)

HttpStatusCode::getMessageByCode( \Rb\Core\HttpStatusCode::NOT_FOUND ); // returns string "Not Found"

HttpStatusCode::getCodeWithMessage( \Rb\Core\HttpStatusCode::CREATED ); // returns string - code and message, e.g. "201 Created"
```

## Configuration

Once you have vendor published, you should see `config/response_builder.php` file.

**request_path** - Generated request classes will be stored in specified directory.  

**request_namespace** - Namespace for generated request class.  

**is_authorize** - Default value of Request's authorize() method.

**messages** - Contains messages for Response's "message" field.  

*messages.failed_validation* - Default message for response that failed the validation.

## Fields

`status` - boolean ( Not Nullable )  
`status code` - integer ( Not Nullable )  
`message` - string ( Nullable )  
`data` - mixed ( Nullable )  
`errors` - mixed ( Nullable )  
