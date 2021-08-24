![Big Picture Tech Test](https://repository-images.githubusercontent.com/290127167/d8659980-e792-11ea-84cf-61f5e870222e)

# Overview
This repository is the starting point for Big Picture's Laravel Tech Test.

The codebase contains a fresh Laravel 7 installation with Laravel Sanctum for SPA authentication.

We have then added some basic patient management functionality which we would like you to extend.

Note: As this is an API only codebase, we have removed the web routes, web components, and the `/api` route prefix.

## Setup

### Repo

Start by cloning this repository locally. 
You will not need to publish your copy on GitHub as we are requesting that you send us a zip or tarball *with the git history intact*.

### Installation

With php and composer installed on your host, it should be sufficient to run `composer install` and `php artisan test` to get started.

### Database

The existing tests have been configured to use an SQLite in-memory database.

### Test Setup

We will be using the test suite to assess your solutions and how you interact with the code you've developed. 
As such, we recommend using the tests as the sole touchpoint with your code.
However, feel free to also run the server if that suits your workflow better, whether that be `php artisan serve`, Valet, or `docker-compose`.

# The Tasks

Before getting started, should you have any questions regarding any of the tasks please email phillip@bigpicturemedical.com. 

## 1. Send a welcome notification 

Creating a patient is a significant event in our system, so we would like to update the existing behaviour to send a welcome email notification to them on creation.

* The content of this notification will be determined at a later date by the clinical department, so placeholder text is fine for this test.
* No real emails should be sent during automated testing.
* Email sending can be slow and error-prone so we don't want it to occur as part of the request lifecycle.

## 2. Expose an internal medications API 

In this scenario, there is an internal medication API server that we want to interact with.

The API endpoint returns a list of medications.

This API doesn't require authentication.

The URL is: http://backend-tech-test-public.s3-website-ap-southeast-2.amazonaws.com/medications/

By visiting that URL, can see the generalised structure of the content is...

   ```json
   [
        {
            "id": 877262,
            "name": "Paracetemol",
            "added": "2020-01-02"
        },
        // ...
   ]
   ```

This endpoint will soon allow us to search for medications using a string-based search query parameter, but this functionality is not yet possible.

An example of performing a search would be `http://backend-tech-test-public.s3-website-ap-southeast-2.amazonaws.com/medications/?search=Para`

This task aims to have you proxy requests to this API via Laravel and allow the front-end to perform searches on the API utilising the upcoming `?search=query` functionality. Note: you should not manually filter the results - just assume that the API is filtering the results.

Important to note is that our front-ends only need the `id` and `name`, however, we use different domain logic at Big Picture and wish the medication `id` to be exposed as "code". Ideally, we would like the Laravel response to look like this:

   ```json
   {
       "data": [
           {
               "code": 877262,
               "name": "Paracetemol"
           },
           {
               "code": 71510,
               "name": "Paraldehyde"
           }
       ]
   }
   ```

Your automated tests should not make requests to this server, but your production code should.

## 3. Add the ability to record a patient's medications
Doctors need to document the medications that a patient is currently taking, or has taken in the past.

The following information is significant for this process:
* The medication name
* The medication code (can be alphanumeric)
* The date they commenced taking the medication
* The date they completed taking the medication
* The dosage (this can just be a text description)

The front-end will need endpoints for assigning medications to a patient, and for listing existing patient medications.

## What we're looking for

* Idiomatic, conventional Laravel
* Knowledge of Laravel features and the appropriate usage (this isn't "Laravel Bingo", so don't feel you need to show off everything you know if it doesn't suit the tasks)
* Simple, readable code
* Tests as documentation
* Git hygiene

## Good to know

* If there is anything you would like to do or recommend that would take more time than is reasonable, please feel free to document and share rather than implementing it.
* There are many valid ways to solve this. Don't panic about choosing a particular approach over another. Feel free to document the reasons for your decisions if you like, or we can discuss it afterwards.
* We are mindful of your time and have tried to simplify the scenarios from what might happen in reality. For example, in reality, the medication dosage would benefit from being stored with more structure. Feel free to let us know any gaps you've found, but please don't feel any pressure to make it 100% real-world ready.
* There are no trick questions. We're on the same team. If something seems wrong, please don't be afraid to bring it up or ask questions, but know that nothing is deliberately wrong in the codebase.

## Submission

Once complete, please create a zip file or tarball of your repository with the git history intact, but preferably without the vendor directory. Then please send your solution to phillip@bigpicturemedical.com.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
