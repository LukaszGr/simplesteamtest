## Simplestream techtest

Steps to follow to run the applcation:

1. `git clone` this repo
2. run `composer install`
3. run `npm install`
4. run `npm run dev`
5. make copy of .env file `cp .env.example .env`
6. generate an app encryption key `php artisan key:generate`
7. create an empty database
8. update .env with database details
9. migrate the database `php artisan migrate`
10. seed the database `php artisan db:seed`
11. launch dev server `php artisan serve`
12. go to <http://127.0.0.1:8000>

## Additional notes

The app is far from finished. Did not have time to implement comment functionality. In real live application I would introduce repo pattern and exluded database transactions from the Home controller. 