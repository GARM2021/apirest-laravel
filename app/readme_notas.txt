20220323 18:06

D:\xampp\apache\conf\extra\httpd-vhosts.conf

<VirtualHost *:80>
  
    DocumentRoot "D:/xampp/htdocs/apirest-laravel/public/"
    ServerName apirest-laravel.com
  </VirtualHost>

 C:\Windows\System32\drivers\etc\hosts

# localhost name resolution is handled within DNS itself.
	127.0.0.1       localhost
    127.0.0.1       apirest-laravel.com
#	::1             localhost

// C24
VerifyCsrfToken.php
// C25
https://laravel.com/docs/8.x/validation#manually-creating-validators
// C26
https://laravel.com/docs/8.x/hashing

//C30 
Marcaba el error 419 Page Expired 

El problema es que no estamos enviando el token CSRF con el formulario.

>>>no habia guardade el protected $except del request de INSERTAR CURSO <<<

//C33
En phpMyAdmin al realizar las RELACIONES no hubo necesidad de crear indices para las llaves foraneas cursos.id_creador

