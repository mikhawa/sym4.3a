
git:

        symfony new --full sym43a

        cd sym43a/
        
        symfony server:start

for demo:

		symfony new --demo my_demo

create db from .env.local

                php bin/console doctrine:database:create

create db's table(s) from Entity folder:

                php bin/console doctrine:schema:create 

create GeneralController:

                php bin/console make:controller 

for using ORM fixtures:

                composer require orm-fixtures --dev

create fixtures:

                php bin/console make:fixtures

