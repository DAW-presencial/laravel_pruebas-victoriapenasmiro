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

### Tags
Para cada punto del examen se ha hecho un commit y se ha etiquetado con un tag haciendo referencia al punto del ejercicio.



