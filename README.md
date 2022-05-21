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

*Test coverage also available.Please run php artisan test to run test cases. 

*Sandbox link( https://phpsandbox.io/e/x/ser2n?layout=EditorPreview&defaultPath=%2F&theme=dark&showExplorer=no&openedFiles= )
