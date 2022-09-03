API is protected by CSRF Token
use route /token to get CSRF token and include into headers parameter with key "X-XSRF-TOKEN"

OR modify \app\Http\Middleware\VerifyCsrfToken.php and remove block comment

Run "php artisan migrate:fresh --seed" to migrate database

> Route List

-   /login (POST)
-   /register (POST)

-   /checklist (GET)
-   /checklist (POST)
-   /checklist (DELETE)

-   /checklist/{ChecklistID}/item/ (GET)
-   /checklist/{ChecklistID}/item/{ItemID} (GET)
-   /checklist/{ChecklistID}/item (POST)
-   /checklist/{ChecklistID}/item/{ItemID} (PUT)
-   /checklist/{ChecklistID}/item/rename{ItemID} (PUT)
-   /checklist/{ChecklistID}/item/{ItemID} (DELETE)
