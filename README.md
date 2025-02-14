# Venta de libros Sitio Web

Sitio web de prueba para vender libros digitales.

Autor: Jesús Adame Sandoval

## Funciones principales

En esta página puedes ver los libros registrados, iniciar sesión, registrar editar y eliminar libros.

## Requerimientos

1. Tener la versión más reciente de php 8.2^.
2. Composer instalado.
3. Node y npm.
4. Tener un gestor de base de datos instalado (Mariadb/MySql)

## Instalación

Para instalar el proyecto y correrlo en local en necesario los siguientes comandos.

1. crear tu archivo de entorno .env basado en el archivo de ejemplo .env.example
2. crear una nueva base de datos "venta_libros" y conectarla en el archivo .env
3. abrir una nueva terminal y correr los siguientes comandos.
4. composer install
5. npm install
6. npm run build
7. php artisan migrate
8. php artisan db:seed
9. php artisan serve

Listo, para ver el sistema entrar a la dirección http://localhost:8000
