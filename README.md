# Laravel Technical Test

This repository is the starting point for the Big Picture Medical Laravel Technical Test.

## Background

This codebase contains a fresh Laravel 7 installation with Laravel Sanctum for SPA authentication.

As this is an API only, we have removed the web routes and other web components, as well as the `/api` route prefix.

We have then added some basic patient management functionality which we would like you to extend.

## Setup

Start by cloning this repository locally. You do not need to publish your copy on GitHub as we will be requesting that you send us a zip or tarball with the git history intact.

The existing tests have been configured to use an SQLite in-memory database so it should be sufficient to just run `composer install` and then `php artisan test` to get started.

We are happy for the tests to be the sole entrypoint and that is where we'll be looking to see how to you use your API. However, feel free to also run the server if that suits your workflow better, whether that be `php artisan serve`, Valet, or even `docker-compose`.

## The tasks

1. Creating a patient is a significant event in our system, so we would like to update the existing behaviour to send a welcome email notification to them on creation.

   The content will be determined by the clinical department, so placeholder text is fine.

   The automated tests should cover this, but no real emails should be sent during automated testing.

   Email sending can be slow and error prone so we don't want it to occur as part of the request lifecycle.

2. Imagine we have an internal medication API server on an Amazon VPC that is not publicly accessible.

   This internal API doesn't require authentication, but we do have different servers set up for staging and production.

   There is just one endpoint and it can be used to search for medications matching a string.

   An example of the URL might be `http://198.51.100.21/medications?search=Para`

   It returns JSON data in the following general structure:

   ```json
   [
        {
            "id": 877262,
            "name": "Paracetemol",
            "...": "..."
        },
        {
            "id": 71510,
            "name": "Paraldehyde",
            "...": "..."
        }
   ]
   ```

   Our front-end application needs to be able to search this data via the Laravel API. We only care about the `id` and `name`, however we think of the `id` as a medication "code", so we would like the Laravel response to look like this:

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

   Your automated tests should not actually make requests to this server (in part because it doesn't actually exist).

3. Doctors need to be able to document the medications a patient is currently taking and has taken in the past.

   The front-end will need endpoints for assigning medications to a patient, and for listing existing patient medications.

   The following information is significant:
   * The medication name
   * The medication code (may be alphanumeric)
   * The date they commenced taking the medication
   * The date they completed taking the medication
   * The dosage (this can just be a text description)

## What we're looking for

* Idiomatic, conventional Laravel
* Knowledge of Laravel features and the appropriate usage (this isn't "Laravel Bingo", so don't feel you need to show off everything you know if it doesn't suit the scenario)
* Simple, readable code
* Tests as documentation
* Git hygiene

## Good to know

* If there is anything you would like to do or recommend that would take more time than is reasonable, please feel free to write a list rather than implementing it.
* There are many valid ways to solve this. Don't panic about choosing a particular approach over another. Feel free to document the reasons for your decisions if you like, or we can just chat about it afterwards.
* We are mindful of your time and have tried to simplify the scenarios from what might happen in reality. For example, the medication dosage would benefit from being stored with more structure rather than as a string but we felt that might be too onerous on you. Feel free to let us know any gaps you've found, but please don't feel any pressure to make it 100% real-world ready.
* There are no trick questions. We're on the same team. If something seems wrong, please don't be afraid to bring it up or ask questions, but know that nothing is deliberately wrong.

## Submission

Once complete, please create a zip file or tarball of your repository with the git history intact, but preferably without the vendor directory. Then please send your solution to phillip@bigpicturemedical.com.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
