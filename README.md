#Comandos de inicio
##requitisitos DB
cerveza
    etiquetas pueden ser varias
    clasificadas categorias 
    graduacion 
    descripcion
categoria
etiqueta
usuario registrados no se relacionan con nada , solo para dar de alta cervezas
 area publica que se muestre las puntuacion

ajax es un ver mas que al hacer click devuelve un json con una lista
se le pasa un numero  y a partir de ese muestra las siguientes 
y con ese json pintamos los html 


https://www.cervemur.es/tipos-de-cerveza/

##Creaciòn de base de datos
crear archivo .env.local y poner este codigo
```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
```
esto para crear usuario con privilegios y base de datos 
```
CREATE USER 'cerveza'@'localhost' IDENTIFIED BY 'cerveza';
GRANT ALL PRIVILEGES ON *.* TO 'cerveza'@'localhost';

php bin/console doctrine:database:create

php bin/console make:entity

```
##una vez creadas las entidades hacemos migration y lo subimos
```
php bin/console make:migration

php bin/console doctrine:migrations:migrate


```
##requerimos las fixtures con 
```
 composer require --dev orm-fixtures


```
##par crear fixtures 
```
php bin/console make:fixtures
```
y para cargarlos es
```
php bin/console doctrine:fixtures load
``` 
##para las rutas instalamos el security-bundle
```
composer require symfony/security-bundle
```

##instalar admin
```
composer require admin
```

#Git ingone

###> symfony/framework-bundle ###
/.env.local
/.env.local.php
/.env.*.local
/config/secrets/prod/prod.decrypt.private.php
/public/bundles/
/var/
/vendor/
###< symfony/framework-bundle ###

###> symfony/phpunit-bridge ###
.phpunit
.phpunit.result.cache
/phpunit.xml
###< symfony/phpunit-bridge ###