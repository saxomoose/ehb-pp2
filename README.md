<img align="right" width="auto" height="auto" src="https://www.elastic.co/static-res/images/elastic-logo-200.png"/>

Insuraquest
===========

A school project from course Programming Project 2, Group 2, Professional Bachelor "Applied IT" at Erasmumshogeschool Brussel.

Search engine application for insurance documents.
Insurance companies store documents on legislation, jurisprudence and legal doctrine in their particular field.
The goal is to provide employees an easy-to-use search engine application based on the algorythms of the Elasticsearch framework.

Table of Contents
=================

- [Insuraquest](#Insuraquest)
  * [Features](#features)
  * [Components](#components)
  * [Documentation](#documentation)
  * [Installation via Composer](#installation-via-composer)
  * [PHP Version Requirement](#php-version-requirement)
  * [Quickstart](#quickstart)
    + [Index a document](#index-a-document)
    + [Get a document](#get-a-document)
    + [Search for a document](#search-for-a-document)
    + [Delete a document](#delete-a-document)
    + [Delete an index](#delete-an-index)
    + [Create an index](#create-an-index)
    + [Upload a document](#upload-a-document)
    + [Mail a document](#mail-a-document)
- [Unit Testing using Mock a Elastic Client](#unit-testing-using-mock-a-elastic-client)
- [Contributing](#contributing)
- [Wrap up](#wrap-up)
  * [Available Licenses](#available-licenses)
    + [Contributions](#contributions)

Features
--------

 - Registry and login of users
 - Management of roles and authorisations: guest, user, librarian, admin, superadmin
 - Upload of documents in .pdf, .png or .jpeg format on server location
 - At upload, the librarian enters all metadata (tags) with the upload
 - Documents are picked up by fsCrawler, converted to json and presented, together with all the manual metadata, to the Elasticsearch stack for indexing
 - Elasticsearch stores all documents on index "insuraquest" in json format  
 - All users (except for guests) can perform ful text searches on content and add filters based on criteria such as language, issuer, insurance type, etc.
 - Search results are shown in order of relevance (highest scores are shown on top); highlighting leads to rendering only some fragments of the content 
 - Full reading of the document is only a click away.
 - Modification of tags 
 - Tables related to users and auhorisations as well as metadata options are stored in a SQL database

Components
----------

| Component             | Version                  |
| --------------------- | ------------------------ |
| Linux Ubuntu          |                          |
| FsCrawler             |                          |
| Elasticsearch         | 6.8                      |
| Elasticsearch-PHP     | 6.7                      |
| PHP                   | 7.4.10 (cli)             |
| Composer              | 2.0.6                    |
| Laravel Installer     | 4.1.0                    |
| MySQL                 |                          |

**Note:** fsCrawler vXXXX is only compatible with Elasticsearch 6.8. Consequently, require package Elasticsearch-PHP v6.7 in your Laravel composer.json file 

Documentation
--------------
[Full documentation can be found here.](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html)  Docs are stored within the repo under /docs/, so if you see a typo or problem, please submit a PR to fix it!

We also provide a code examples generator for PHP using the `util/GenerateDocExamples.php` script. This command parse the `util/alternative_report.spec.json` file produced from this [JSON specification](https://raw.githubusercontent.com/elastic/built-docs/master/raw/en/elasticsearch/reference/master/alternatives_report.json) and it generates the PHP examples foreach digest value.
The examples are stored in asciidoc format under `docs/examples` folder.

Installation via Composer
-------------------------
The recommended method to install _Elasticsearch-PHP_ is through [Composer](http://getcomposer.org).

1. Add `elasticsearch/elasticsearch` as a dependency in your project's `composer.json` file (change version to suit your version of Elasticsearch, for instance for ES 7.0):

    ```json
        {
            "require": {
                "elasticsearch/elasticsearch": "^7.0"
            }
        }
    ```

2. Download and install Composer:

    ```bash
        curl -s http://getcomposer.org/installer | php
    ```

3. Install your dependencies:

    ```bash
        php composer.phar install
    ```

4. Require Composer's autoloader

    Composer also prepares an autoload file that's capable of autoloading all the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process:

    ```php
        <?php

        use Elasticsearch\ClientBuilder;

        require 'vendor/autoload.php';

        $client = ClientBuilder::create()->build();
    ```

You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at [getcomposer.org](http://getcomposer.org).

PHP Version Requirement
----
Version 7.0 of this library requires at least PHP version 7.1. In addition, it requires the native JSON
extension to be version 1.3.7 or higher.

| Elasticsearch-PHP Branch | PHP Version |
| ----------- | ------------------------ |
| 7.0         | >= 7.1.0                 |
| 6.0         | >= 7.0.0                 |
| 5.0         | >= 5.6.6                 |
| 2.0         | >= 5.4.0                 |
| 0.4, 1.0    | >= 5.3.9                 |


Quickstart
----


### Index a document

In elasticsearch-php, almost everything is configured by associative arrays. The REST endpoint, document and optional parameters - everything is an associative array.

To index a document, we need to specify three pieces of information: index, id and a document body. This is done by
constructing an associative array of key:value pairs.  The request body is itself an associative array with key:value pairs
corresponding to the data in your document:

```php
$params = [
    'index' => 'my_index',
    'id'    => 'my_id',
    'body'  => ['testField' => 'abc']
];

$response = $client->index($params);
print_r($response);
```

The response that you get back indicates the document was created in the index that you specified.  The response is an
associative array containing a decoded version of the JSON that Elasticsearch returns:

```php
Array
(
    [_index] => my_index
    [_type] => _doc
    [_id] => my_id
    [_version] => 1
    [result] => created
    [_shards] => Array
        (
            [total] => 1
            [successful] => 1
            [failed] => 0
        )

    [_seq_no] => 0
    [_primary_term] => 1
)
```


### Get a document

Let's get the document that we just indexed.  This will simply return the document:

```php
$params = [
    'index' => 'my_index',
    'id'    => 'my_id'
];

$response = $client->get($params);
print_r($response);
```

The response contains some metadata (index, version, etc.) as well as a `_source` field, which is the original document
that you sent to Elasticsearch.

```php
Array
(
    [_index] => my_index
    [_type] => _doc
    [_id] => my_id
    [_version] => 1
    [_seq_no] => 0
    [_primary_term] => 1
    [found] => 1
    [_source] => Array
        (
            [testField] => abc
        )

)
```

If you want to retrieve the `_source` field directly, there is the `getSource` method:

```php
$params = [
    'index' => 'my_index',
    'id'    => 'my_id'
];

$source = $client->getSource($params);
print_r($source);
```

The response will be just the `_source` value:

```php
Array
(
    [testField] => abc
)
```

### Search for a document

Searching is a hallmark of Elasticsearch, so let's perform a search.  We are going to use the Match query as a demonstration:

```php
$params = [
    'index' => 'my_index',
    'body'  => [
        'query' => [
            'match' => [
                'testField' => 'abc'
            ]
        ]
    ]
];

$response = $client->search($params);
print_r($response);
```

The response is a little different from the previous responses.  We see some metadata (`took`, `timed_out`, etc.) and
an array named `hits`.  This represents your search results.  Inside of `hits` is another array named `hits`, which contains
individual search results:

```php
Array
(
    [took] => 33
    [timed_out] =>
    [_shards] => Array
        (
            [total] => 1
            [successful] => 1
            [skipped] => 0
            [failed] => 0
        )

    [hits] => Array
        (
            [total] => Array
                (
                    [value] => 1
                    [relation] => eq
                )

            [max_score] => 0.2876821
            [hits] => Array
                (
                    [0] => Array
                        (
                            [_index] => my_index
                            [_type] => _doc
                            [_id] => my_id
                            [_score] => 0.2876821
                            [_source] => Array
                                (
                                    [testField] => abc
                                )

                        )

                )

        )

)
```

### Delete a document

Alright, let's go ahead and delete the document that we added previously:

```php
$params = [
    'index' => 'my_index',
    'id'    => 'my_id'
];

$response = $client->delete($params);
print_r($response);
```

You'll notice this is identical syntax to the `get` syntax.  The only difference is the operation: `delete` instead of
`get`.  The response will confirm the document was deleted:

```php
Array
(
    [_index] => my_index
    [_type] => _doc
    [_id] => my_id
    [_version] => 2
    [result] => deleted
    [_shards] => Array
        (
            [total] => 1
            [successful] => 1
            [failed] => 0
        )

    [_seq_no] => 1
    [_primary_term] => 1
)
```


### Delete an index

Due to the dynamic nature of Elasticsearch, the first document we added automatically built an index with some default settings.  Let's delete that index because we want to specify our own settings later:

```php
$deleteParams = [
    'index' => 'my_index'
];
$response = $client->indices()->delete($deleteParams);
print_r($response);
```

The response:


```php
Array
(
    [acknowledged] => 1
)
```

### Create an index

Now that we are starting fresh (no data or index), let's add a new index with some custom settings:

```php
$params = [
    'index' => 'my_index',
    'body'  => [
        'settings' => [
            'number_of_shards' => 2,
            'number_of_replicas' => 0
        ]
    ]
];

$response = $client->indices()->create($params);
print_r($response);
```

Elasticsearch will now create that index with your chosen settings, and return an acknowledgement:

```php
Array
(
    [acknowledged] => 1
)
```

### Upload a document

A Librarian account has the possibility to upload new files. When uploading a document
    -   It is possible to add tags
Op de librarian page de mogelijkheid tot uploaden files toegevoegd.
Routes toegeveoegd van librarian page naar nieuwe Fileuploadcontroller voor het wegschrijven van files naar mapje public/uploads'
*** Momenteel nog naar lokale map in laravel- Moet naar folder waar FSCrawler zal gaan scannen voor ElasticSearch***

Plugin toegevoegd (tailwind.config.js) om de layout van forms in Tailwind te kunnen gebruiken.
https://tailwindcss-custom-forms.netlify.app/

### Mail a document


Op de librarian page de mogelijkheid tot uploaden files toegevoegd.
Routes toegeveoegd van librarian page naar nieuwe Fileuploadcontroller voor het wegschrijven van files naar mapje public/uploads'
*** Momenteel nog naar lokale map in laravel- Moet naar folder waar FSCrawler zal gaan scannen voor ElasticSearch***

Plugin toegevoegd (tailwind.config.js) om de layout van forms in Tailwind te kunnen gebruiken.
https://tailwindcss-custom-forms.netlify.app/



Unit Testing using Mock a Elastic Client
========================================
```php
use GuzzleHttp\Ring\Client\MockHandler;
use Elasticsearch\ClientBuilder;

// The connection class requires 'body' to be a file stream handle
// Depending on what kind of request you do, you may need to set more values here
$handler = new MockHandler([
  'status' => 200,
  'transfer_stats' => [
     'total_time' => 100
  ],
  'body' => fopen('somefile.json'),
  'effective_url' => 'localhost'
]);
$builder = ClientBuilder::create();
$builder->setHosts(['somehost']);
$builder->setHandler($handler);
$client = $builder->build();
// Do a request and you'll get back the 'body' response above
```

Wrap up
=======

That was just a crash-course overview of the client and its syntax.  If you are familiar with Elasticsearch, you'll notice that the methods are named just like REST endpoints.

You'll also notice that the client is configured in a manner that facilitates easy discovery via the IDE.  All core actions are available under the `$client` object (indexing, searching, getting, etc.).  Index and cluster management are located under the `$client->indices()` and `$client->cluster()` objects, respectively.

Check out the rest of the [Documentation](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html) to see how the entire client works.


License
-------

Please note that this project is for use within the school context.
For further development, please contact te  
The user may choose which license they wish to use.  Since there is no discriminating executable or distribution bundle
to differentiate licensing, the user should document their license choice externally, in case the library is re-distributed.
If no explicit choice is made, assumption is that redistribution obeys rules of both licenses.
