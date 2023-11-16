# Proyecto
Vumi Agents

# Requerimientos
- PHP 8.1
- composer
- node 18.16.0

##Instalacion inicial
```
composer install
npm install yarn
yarn install
yarn encore dev
symfony server:start
```
##Recomendaciones generales
Para realizar las pruebas funcionales se puede el equipo de guiar de la propia herramienta del sistema o con el software POSTMAN.
```
yarn encore dev
```
si se va a modificar varias veces los archivo scss o js se recomienda dejar el yarn escuchando 
```
yarn encore dev --watch
```

para instalar paquetes de JS se hace usando el comando 
```
yarn install nombre-paquete 
```

si se desea agregar otro archivo js o css se debe registrar en el archivo webpack.config.js
```
// webpack.config.js
  Encore
      // ...
      .addEntry('app', './assets/app.js')
+     .addEntry('checkout', './assets/checkout.js')
```
los recursos staticos se recomienda llamarlos usando la funcion asset, ejemplo
```
//si la imagen esta en la ruta /public/imgs/logo.jpg
<img width="100px" src="{{ asset('imgs/logo.jpg') }}" alt="Logo!">
//si el archivo es "public/css/blog.css"
<link href="{{ asset('css/blog.css') }}" rel="stylesheet"/>
```

las rutas o secciones se definen en los controladores ubicados en la ruta _/src/Controller_
```
    #[Route('/ruta', name: 'nombre_ruta')]
    public function nombreFuncion(): Response
    {
        return $this->render('home/nombre_tempate.html.twig', [
        ]);
    }
```

los links a otras secciones se deben hacer usando el nombre de la ruta, ejemplo 
```
// existe una ruta llamada productos
<a href="{{ path('productos') }}">ejemplo de como ir a otra seccion </a>
```

para crear el template seguir las siguientes recomendaciones
> usar *snake case* ejemplo. **detalle_producto**
>
> poner las dos extenciones en los archivos .html.twig
>
> mantener la estructura de carpetas segun el controlador, ej. si la ruta esta en el controlador home el template deberia estar en _/templates/home_
>
>en caso de ser una archivo que se va a reusar en diferentes controladores ubicarlo en  _/templates/global_

para incluir parciales, usar la funcion include
``` 
{{ include('blog/_user_profile.html.twig') }}
``` 

para mayores referencias visitar [symfony templates](https://symfony.com/doc/current/templates.html)


## ingenieria
la idea es tener la logica de las diferentes funcionalidades separada en controladores, sin importar que un controlador quede con solo una ruta, se recomienda crearlo
 
 para gregar controladores usamos el comando 
```
symfony console make:controller HomeController
```

para crear las entidades se usa el comando 
```
php bin/console make:entity
```

para sincronizar el modelo con la base de datos
```
// para generar las migraciones
php bin/console make:migration
// para ejecutar las migraciones
php bin/console doctrine:migrations:migrate
```


```
docker run --name selly-redis -d -p 6379:6379 redis
```