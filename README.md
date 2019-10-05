# Prueba técnica para Resolve Studio

## Instalación

- Instale y ejecute [Docker](https://www.docker.com/) *(este proyecto usa **docker-compose**)*.

- Descargue o clone este repositorio GIT en su máquina local.

- Copie el archivo `~/src/.env.example` y nobrelo `.env`, ajuste las variables de entorno según corresponda.

- Ejecute una terminal y cambie el directorio a la raíz de este proyecto.

## Entorno de desarrollo

- Ejecute `docker-compose up` para iniciar los **contenedores de Docker** *(espere mientras se completa la ejecución del comando)*, al terminar, se tendrá un servidor local disponible en `http://localhost/`.

> Ejecute `docker-compose up --build` si cambia cualquier archivo de Docker.

## Detener

- Ejecute `docker-compose stop` para **detener** los contenedores.

*o*

- Ejecute `docker-compose down` para **detener** y **eliminar** los contenedores.

> Agregue el argumento `-v` o `--volumes` para eliminar los volúmenes.

## Ejecutar comandos

Ejecute `docker-compose exec app bash` para entrar a la terminal del contenedor de Laravel.

> Dentro del contenedor puede instalar **dependencias de Composer** o cualquier otro comando de Artisan.