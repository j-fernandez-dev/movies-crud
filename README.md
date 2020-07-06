# Instalación

- Clonar el repositorio\
$ git clone https://github.com/j-fernandez-dev/movies-crud.git

- Crear una base de datos\
$ mysql -h localhost -u \<usuario\> -p\
\> create database \<db\>;

- Entrar al directorio\
$ cd movies-crud

- Instalar dependencias\
$ composer install

- Editar archivo .env para configurar la base de datos creada\

- Realizar la migración\
$ php artisan migrate

- Ejecutar la aplicación\
$ php artisan serve

- Dirigirse a http://localhost:8000

# Comandos cURL para la API

## Login

curl -H "Content-Type: application/json" -H "Accept: application/json" -X POST -d '{ "email":"\<email\>", "password":"\<password\>" }' http://localhost:8000/api/auth/login | jq

## Perfil

curl -H "Content-Type: application/json" -H "Accept: application/json" -H "Authorization: Bearer \<token\>" -X POST http://localhost:8000/api/auth/me | jq

## Refresh token

curl -H "Content-Type: application/json" -H "Accept: application/json" -H "Authorization: Bearer \<token\>" -X POST http://localhost:8000/api/auth/refresh | jq

## Logout

curl -H "Content-Type: application/json" -H "Accept: application/json" -H "Authorization: Bearer \<token\>" -X POST http://localhost:8000/api/auth/logout | jq

## Obtener películas

curl -H "Content-Type: application/json" -H "Accept: application/json" -H "Authorization: Bearer \<token\>" -X GET http://localhost:8000/api/movies | jq

## Crear una película

curl -H "Content-Type: application/json" -H "Accept: application/json" -H "Authorization: Bearer \<token\>" -X POST -d '{ "title":"Darkman", "genre":"Acción", "director":"El vecino", "year":1990, "minutes":128 }' http://localhost:8000/api/movies | jq

## Obtener película

curl -H "Content-Type: application/json" -H "Accept: application/json" -H "Authorization: Bearer \<token\>" -X GET http://localhost:8000/api/movies/<id> | jq

## Actualizar película

curl -H "Content-Type: application/json" -H "Accept: application/json" -H "Authorization: Bearer \<token\>" -X PUT -d '{ "title":"Enter the dragon", "minutes":99 }' http://localhost:8000/api/movies/<id> | jq

## Eliminar película

curl -H "Content-Type: application/json" -H "Accept: application/json" -H "Authorization: Bearer \<token\>" -X DELETE http://localhost:8000/api/movies/<id> | jq

## Subir archivo

curl -H "Accept: application/json" -H "Authorization: Bearer \<token\>" -F "file=@movies-crud.csv;type=text/csv" http://localhost:8000/api/movies/upload | jq

# Archivo CSV

Es posible subir un archivo con el siguiente formato:

\<title\>;\<genre\>;\<director\>;\<year\>;\<minutes\>

En el directorio principal se encuentra el archivo movies-cruc.csv como ejemplo:

The lord of the rings;Action;Peter Jackson;2001;178\
Enter the dragon;Action;Robert Clouse;1973;102\
Léon;Drama;Luc Besson;1994;110\
The Godfather;Drama;Coppola;1972;175\
Tinker Tailor Soldier Spy;Thriller;Tomas Alfredson;2011;122\
The Matrix;Sci-Fi;Wachowski;1999;136\
Point Break;Action;Kathryn Bigelow;1991;122
