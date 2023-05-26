# CodeIgniter 4 + Bootstrap 4 + DataTables + JavaScript + jQuery - Sample CRUD App

This is a sample CRUD app that was developed as a 'take-home' task to demonstrate my technical knowledge in a specific technology stack. This app was mainly developed using CodeIgniter 4, Bootstrap 4, DataTables, JavaScript, jQuery and the provided 'SmartAdmin' UI components. I have used traditional form submission and JQuery(Ajax) submission to demonstrate my knowledge in both areas. I have used JQuery as a UI manipulation tool as well.  This project also demonstrates the skills of using CodeIgniter features such as models, migrations, seeders, routes(including APIs), transactions, validations and many other features.

## Installation & updates

Pre-requisites for CodeIgniter 4 need to be fulfilled before cloning this app. Please follow this official documentation  for setting up CodeIgniter https://www.codeigniter.com/user_guide/installation/index.html

Clone the `main` branch of this repository.

## Setup

- Run `composer i` install the dependencies. 
- Copy `env` to `.env` and specifically the baseURL and any database settings that match with your dev environment.
- Create a database called `cf-user-crud` to match the settings on the env file.
- Run `php spark migrate --all` to migrate the default table structures.
- Run `php spark db:seed TestDataSeeder` to fill the migrated tables with fake data(optional).
- Run `php spark serve` to run the dev server or configure the project directory with your local server configuration.
- Open the app on your browser, By default, it will route to the "User Data" page.



