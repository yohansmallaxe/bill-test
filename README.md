# Steps to follow once the source code is available



*Copy ".env.example" to ".env"(provide the correct database credentials).

*run php artisan key:generate

*run composer install.

*run php artisan migrate.



# Routes

1.POST :api/register ,parameters('name,email,password').Will register a user and provide a bearer token to make auth
requests.Pass this bearer token with all other routes.Otherwise throw an error,saying unauthenticated.



2.POST :api/bill ,parameters:('units'). Calculates the bill for given units.



3.GET :api/bills .Show all the bills for added units.



4.PUT api/bill/{bill_id} ,parameters:('units'). Update the bill for given bill id

*Test coverage also available.Please run php artisan test to run test cases.(If you wish to use sqlite as test environment database,create a file named as "database.sqlite" under the database directory) 

*Sandbox link(  https://phpsandbox.io/e/x/senfr?layout=EditorPreview&defaultPath=%2F&theme=dark&showExplorer=no&openedFiles=  )

#Used Technoloy

1.Laravel v 9.13
2Laravel/sanctum (Token based authentication)

## Prefer to test with Api testing tool.such as  Postman.(To authenticate, need to send a bearer token which will provided once registered in the system)
