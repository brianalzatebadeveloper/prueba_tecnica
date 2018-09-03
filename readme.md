## Prueba Tecnica

**version de laravel 5.5.43**

El framework require algunas configuraciones previas antes de iniciar su funcionamiento:

1. configurar el archivo .env
2. ir a la ruta *vendor/laravel/framework/src/illuminate/Foundation/Auth/AuthenticatesUsers.php*
: el motivo de modificar este archivo es la configuración por defecto de laravel, me refiero a las vistas del login para el admin, pues la configuración del framework es **return view('auth.login');** y la mi configuración es **return view('admin.login.login');** todo esto se realiza en el metodo **showLoginForm()**.
3. ejecutar las migraciones o importan la base de datos.
4. PHP >= 7.0.0 - OpenSSL PHP Extension - PDO PHP Extension - Mbstring PHP Extension - Tokenizer PHP Extension - XML PHP Extension


---

## Datos de informacion - credenciales

Super Admin

**url**: /admin
**username**: brian.1997.alzate@gmail.com
**password**: brian

members

**username o email**: eliana@gmail.com
**password**: eli

---

## Clonar Repositorio

Este repositorio ha sido creado para el manejo seguro del codigo y la estructura del el framework, usted prodra tener una copia original y descargarla a traves del siguiente comando por consola de git - git clone https://github.com/brianalzatebadeveloper/prueba_tecnica.git.

Todos los archivos fuentes han sido manejados de manera segura y confiable, esperamos que utilice el codigo de manera correcta ¡¡Exitos!!.
