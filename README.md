# grenyaobrador.es
official site of grenyaobrador.es

## host info
+ hostinger

## DB
mariadb / mysql
### Example config.php
```injectablephp
<?php

class Config
{
	static $db_host = 'localhost';
	static $db_name = 'grenyaobrador';
	static $db_username  = 'root';
	static $db_password  = 'root';
	static $db_statement_0 = ''; // "SET GLOBAL time_zone='Europe/Madrid'" in PROD
}
```
### Database's diagram
![image info](./grenyaobrador.png)
### Local
+ host: localhost
+ name: grenyaobrador
+ user: root
+ password: root

## links
+ https://hpanel.hostinger.com

## TODO
+ bug timestamp in operations
+ remember me
+ edit products
