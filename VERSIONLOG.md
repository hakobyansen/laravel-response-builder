# Versions

## 1.0.5
* Documentation updated.

## 1.0.4 2021-01-25
* Updated the `RbServiceProvider` to publish `RbRequest` in same directory as specified in configs.

## 1.0.3 2021-01-25
* Documentation updated.

## 1.0.2 2021-01-25
* Return type added to the `authorize()` method.
* Changed the default `request_path` and `request_namespace` config values.
* Changed the namespace of `RbRequest` class.

## 1.0.1 2021-01-25
* `$data` and `$errors` parameters are now optional in the `Rb\Facade\Response` facade.

## 1.0.0 2021-01-25
* PHP 8 is the minimum required version.

## 0.3.1 2020-08-23
* Fixed the providers in composer.json.

## 0.3.0 2020-08-23
* Refactoring.
* Facade\Response class implemented.

## 0.2.2 2019-01-29
* Bug fix related to setStatus method when status code is 2XX

## 0.2.1 2019-01-26
* Using Validator contract in RBValidator.

## 0.2.0 2019-01-20
* RBValidator class created.
* Status automatically set to "true" whenever status code is 2XX.
* RB_Request class renamed to RBRequest.
* HttpStatusCodes class renamed to HttpStatusCode.
* make:rb_request command renamed to make:rbrequest. 

## 0.1.3
* Refactoring.
* Documentation updated.

## 0.1.2 2018-09-18
* Issues fixed related to rb_request blade generator.

## 0.1.1 2018-09-18
* Vendor publishing issue fixed

## 0.1.0 2018-09-18
* Introducing RB_Request.
* Artisan command created for RB_Request generation.
* Making things configurable.

## 0.0.8 2018-09-15
* HttpStatusCodes class created.

## 0.0.7 2018-09-14
* ResponseTest refactoring.

## 0.0.6 2018-09-14
* Updates to composer.json file.

## 0.0.5 2018-09-14
* Type hints added in Response class.
* Readme.md added.

## 0.0.4 2018-09-14
* getResponse() method added.
* unit test created for Response class.

## 0.0.3 2018-09-12
* "src" directory created.
* Composer autoload added.

## 0.0.2 2018-09-12
* Response class created.

## 0.1.3 2018-09-19
* Refactoring.
* Documentation updated.

## 0.1.4

## 0.0.1 2018-09-12
* Initial commit.
