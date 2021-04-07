# Curler
An elegant PHP HTTP client for sending HTTP requests.

## Requirements
* `php 7.1+`
* `OpenSSL`
* `cURL`

## Installation
This library can easily be installed using composer. Run the command below:
```shell script
composer require coderatio/curler
```

___

### `GET`
Because this is built with simplicity in mind from the beginning, below is how easy you can make a `get` request to another server.
```php

require 'vendor/autoload.php';

$curler = new \Coderatio\Curler\Curler();
$curler->get('https://jsonplaceholder.typicode.com/todos');
$response = $curler->getResponse();

```
For `get` requests with parameters, you can pass the parameters as Array like below;

```php

$parameters = [
    'postId' => 1,
];
$curler = new \Coderatio\Curler\Curler();
$curler->get('https://jsonplaceholder.typicode.com/comments', $parameters);
$response = $curler->getResponse();

```
### `POST`
```php

$data = [
  'title' => 'Sample post',
  'body' => 'This is a sample post',
  'userId' => 1
];

$curler = new \Coderatio\Curler\Curler();
$request = $curler->post('https://jsonplaceholder.typicode.com/posts', $data);
$response = $curler->getResponse();

```
If the API endpoint you are calling requires a `data` as json, remember to parse your `$data` array using `json_encode`
### `POST FORM`
Sending form data via curler is as simple sending a `post` request. Just send an array of your form data and curler will take care of the rest. Take a look below:
```php

$data = [
  'first_name' => 'John',
  'last_name' => 'Doe',
  'email' => 'johndoe@example.com'
];

$curler = new \Coderatio\Curler\Curler();
$request = $curler->postForm('https://example.com/store-user', $data);
$response = $curler->getResponse();

```

By default, the `$response` variable will hold a json object of the request. But, there are instances where you want the response in php object or array. You can get them as below:
```php
$response = $curler->getResponse()->asObject();
```
OR
```php
$response = $curler->getResponse()->asArray();
```

___

## Other Request Methods
1. PUT
2. DELETE
3. DOWNLOAD
4. OPTIONS
5. HEAD
6. TRACE

Just as you use the post, get, postForm e.t.c, you can also use the `put`, `delete`, `download`, `options`, `head`, and `trace` methods.

___

## Adding Custom Headers
Sometimes, you may need to send your request with custom headers. Curler, has full support for that and many more. Here is how it can be done.
* ### Single Header
```php

$curler = new \Coderatio\Curler\Curler();
$curler->appendRequestHeader('Content-Type', 'application/json');
$curler->post('https://jsonplaceholder.typicode.com/posts', $data);

$response = $curler->getResponse();

```

* ### Multiple headers
```php

$curler = new \Coderatio\Curler\Curler();
$curler->appendRequestHeaders([
    'Content-Type' => 'application/xml',
    'x-access-token' => 'xxxxxxxxxx'
]);

$curler->post('https://jsonplaceholder.typicode.com/posts', $data);

$response = $curler->getResponse();

```

___

## Get Status Code
Sometimes, you may like to get the status code returned from a request. This can easily be done with curler as below:

```php
$curler->statuseCode;
```

___

## Add cURL options
Since this package is built with flexibility in mind, adding cURL options should be a breeze. Here is how you can add options:
```php
$curler->addCurlOption('CURLOPT_PUT', true); // Single

// OR

$curler->addCurlOptions([
    'CURLOPT_PUT' => true,
    'CURLOPT_POSTFIELDS' => []
]);
```

## Contributors
To be a contributor, kindly fork the repo, add or fix bugs and send a pull request.

## Contribution
To contribute to this project, kindly fork it and send a pull request or find me on <a href="https://twitter.com/josiahoyahaya">Twitter</a>.

## License
This project is licenced with the MIT license.
