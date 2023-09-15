## About
Package `codebot/laravel-response-builder` is a simple package for Laravel framework to standardize the structure of JSON responses.

You will find this package helpful if you need your responses to look like this:

```json
{
  "status": true,
  "message": "You got that!",
  "data" : {
    "name": "James Joesph Bulger", 
    "profession": "criminal"
  },
  "errors": []
}
```

or

```json
{
  "status": false,
  "message": "Something went wrong...",
  "data" : [],
  "errors": {
    "email": [
      "The email field is required."
    ]
  }
}
```

## Installation  
```
composer require codebot/laravel-response-builder:^1
```

**For Laravel 5.4 and versions below add `\Rb\Core\RbServiceProvider::class` to providers in config/app.php file.**

Next run the command below in your console:

```
php artisan vendor:publish --tag=laravel-response-builder
```

## Requests

Once you published vendor, you should see `App\Http\Requests\Rb\RbRequest class`. This will be base class for
laravel-response-builder's requests.  
To generate a request that extends RbRequest, run:
  
```
php artisan make:rbrequest YourNewRequest
``` 

If you are using Laravel's Validator class, you can use `Rb\Core\RbValidator` to standardize the structure of failed response. 

```php
use \Rb\Core\RbValidator;
use Illuminate\Support\Facades\Validator;

$validator = new Validator($data, $rules); // assuming you have a $validator instance

RbValidator::validate($validator); // throws HttpResponseException or returns boolean true 
```

RbValidator::validate() method checks if the validation fails and throws Illuminate\Http\Exceptions\HttpResponseException with the standardized json response structure.

### Usage  
```php
use \Rb\Core\Response;
use \Rb\Core\HttpStatusCode;

$response = new Response();

$response->setStatusCode(HttpStatusCode::OK); // required. If code is 2XX then Response::status field will be "true", otherwise "false"

$response->setMessage('Some inspiring message.');

$response->setData($data);

$response->getArray(); 

$response->getResponse(); // will return json response 
```

All setters are fluent. See example of fluent setters usage for some error response below.

```php
use \Rb\Core\Response;
use \Rb\Core\HttpStatusCode;

$response = new Response();

$response->setStatusCode(HttpStatusCode::UNPROCESSABLE_ENTITY)
    ->setMessage('Some error message.')
    ->setErrorCode($errors)
    ->setErrorCode(
        new \Rb\Core\ErrorCode(
            type: 'validation_error', 
            subType: 'missing_required_field'
        )
    );
```

Package contains HttpStatusCode class with http status codes defined.

```php
use \Rb\Core\HttpStatusCode;

HttpStatusCode::OK; // returns status code 200 (integer)

HttpStatusCode::getMessageByCode(HttpStatusCode::NOT_FOUND); // returns string "Not Found"

HttpStatusCode::getCodeWithMessage(HttpStatusCode::CREATED); // returns string - code and message, e.g. "201 Created"
```

#### The Facade

The package contains a facade class in case if you don't want to interact with all of these setters.

```php
use \Rb\Facade\Response;
use \Rb\Core\HttpStatusCode;

return Response::success(
   data: $data,
   message: 'Created List of users.'
);

return Response::error(
   errors: $errors,
   message: 'Invalid input.',
   statusCode: HttpStatusCode::UNPROCESSABLE_ENTITY
);

// Without $data (the $errors parameter is also optional)
return Response::success(message: 'User deleted.');
```

`$data` and `$errors` variables are arrays and are optional.

## Configuration

Once you have vendor published, you should see `config/response_builder.php` file.

**request_path** - Generated request classes will be stored in specified directory.  

**request_namespace** - Namespace for generated request class.  

**is_authorize** - Default value of Request's authorize() method.

**messages** - Contains messages for Response's "message" field.  

*messages.failed_validation* - Default message for response that failed the validation.

## Fields

`status` - boolean (Not Nullable)  
`status_code` - integer (Not Nullable)  
`message` - string (Nullable)  
`data` - array (Not Nullable, can be empty)  
`errors` - array (Not Nullable, can be empty)
