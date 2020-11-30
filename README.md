# GameFinder

Search for teams who want to play baseball. Tell us what days you're available to play, and we'll show you others who are willing to pick up a game that day too.

## Installation

1. clone the repository
2. run `composer install`
3. run `composer dump-autoload`
4. to set up db locally:
    - run `php artisan migrate`
    - optionally, if you'd like to seed the db: run `php artisan db:seed`
5. run `php artisan serve` to interact with the application at (usually) localhost:8000

You're good to go!

## CI/CD

This application is deployed to guldentech.com kubernetes platform offering.

The contents for CI/CD are as follows:

* Dockerfile - Building the image to be deployed to k8s
* dc-svc-ingress.yaml - Manifest used to deploy to k8s
* .rancher-pipeline.yml - Pipeline config file that will build the image (Using Dockerfile) & deploy the application (Using the manifest)
