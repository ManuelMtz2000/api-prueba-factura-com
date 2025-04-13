# Pasos para ejecutar Back End Laravel

## 1. Copiar .env de .env.example

````
cp .env.example .env
````

## 2. Instalar dependencias con composer

````
composer install
````

## 4. (Opcional) Instalar dependencias con docker (Laravel Sail)
Nota: Se debe tener docker instalado. Ejecutar este comando preferiblemente en Linux o WSL.
````
./vendor/bin/sail up
````

## 5. Generar APP_KEY
````
sail artisan key:generate	
````

## 6. Ejecutar migraciones
````
sail artisan migrate
````

## 7. Acceder a la aplicación
La api estara disponible dentro de http://localhost

Nota: En caso de tener problemas para acceder via docker, modificar el puerto en el archivo docker-compose.yml o dejar libre el puerto 80.