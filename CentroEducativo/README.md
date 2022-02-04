## Usuarios:
Todos los usuarios que se registran desde cero no tienen permisos de admin, y por tanto, no podrán crear, eliminar o editar centros.

#### Acceso administrador:
* Usuario: mpenas@cifpfbmoll.eu
* Password: Examen2022

## Base de datos
La base de datos está desplegada en un servidor remoto de IONOS.

URL: [http://victoriapenyasphp.ddns.net/adminer](http://victoriapenyasphp.ddns.net/adminer)

**Importante**: El acceso a http://victoriapenyasphp.ddns.net/ debe ser desde una red ajena al centro, ya que el firewall lo bloquea.

El acceso a la base de datos se puede recuperar desde el .env del proyecto.

## Despliegue

El proyecto se ha desplegado en el servidor del centro, dentro de la ruta */var/www/ifc33b/mpenas/* [Ver aplicacion](http://mpenas.ifc33b.cifpfbmoll.eu/laravel_pruebas-victoriapenasmiro/CentroEducativo/public/es/centros).

## Aspectos generales
### Gates
* El multiidioma de la aplicación se pasa como parámetro en ls URL y se controla mediante el siguiente Gate:

~~~
    Gate::define('check-language', function($user, $locale){

        if (! in_array($locale, ['en', 'es'])) {
            abort(404);
        }

        App::setLocale($locale);

        return true;
    });
~~~

### FormRequest - validació multiidioma
* Con el objetivo de mostrar los warnings de validación en el idioma correspondiente, se controla en el Form Request creado. ///////TODO, poner nombre

~~~
$lang = $this->route('lang');
abort_unless(Gate::allows('check-language', $lang), 403);
~~~

### Error Pages //TODOOOOO mantengo ??
Se han generado unas vistas personalizadas para los errores 404 y 403.

### Tags
Para cada punto del examen se ha hecho un commit y se ha etiquetado con un tag haciendo referencia al punto del ejercicio.



