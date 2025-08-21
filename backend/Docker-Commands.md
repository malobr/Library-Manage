docker-compose down -v              //Para e remove os conteineres.

docker-compose up -d --build        //Cria e inicia os conteineres.

docker-compose down                 //Apenas Para os conteineres

docker-compose up -d                //Apenas Inicia os conteineres

docker exec -it laravel-app php artisan migrate  //Tudo tem que ser rodado dentro dos conteineres Docker


docker exec -it laravel-app + comando...


npm install && npm run build



php artisan db:seed
