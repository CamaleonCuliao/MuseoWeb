# MuseoWeb

Este es mi TFG del grado superior de Desarrollo de Aplicaciones Web estudiado en el IES Macia Abela, se trata de una pagina de reseñas de museos de Alicante y Murcia

## Descripción

El proyecto es una pagina web programada con HTML, CSS, PHP y JAVASCRIPT que utiliza la arquitectura de desarrollo MVC y usa como metodo de redireccion un router 
programado en PHP, la aplicación deja a los usuarios crear una cuenta, iniciar sesion, 'comprar' entradas a museos, publicar reseñas de museos, añadir museos favoritos y si inician sesion 
con la cuenta de administrador ejecutar operaciones CRUD en la base de datos.

La aplicacion tambien cuenta con una pagina de filtrado, donde los usuarios pueden buscar datos de la bdd segun su tipo, provincia donde se localiza y el texto introducido en
una barra de busqueda, despues de hacer la busqueda pueden exportarla a un pdf con toda la información.

## Historia del proyecto

Empece a desarrollar el proyecto antes de empezar las practicas del grado superior, la primera idea era programar la aplicacion con un frontend en Angular, una API en NODEJS y la base de datos en MySQL,
por esto existe la rama angular, que preserva el trabajo del frontend y de la API que se corto a mitad del desarrollo cuando me di cuenta que era mas facil programar la web en PHP.

Aunque nunca acabare este proyecto en Angular, con el desarrollo aprendí mucho sobre el framework y como programar una API en javascript.

Tambien existe la rama diseño, esto es la primera aplicacion Angular que a servido como referencia para diseñar la estetica de la página

Aqui una tabla con todas las ramas existentes:

| Nombre  | Descripcion |
| ------------- | ------------- |
| main  | La aplicacion php en su estado actual  |
| Angular  | La antigua aplicacion de Angular responsiva con su API  |
| diseño  | La primera version de la aplicacion de Angular estatica |

### Dependencias y librerias

Aunque la mayoria de la aplicación esta escrita con php y javascript nativo, he instalado algunas librerias y herramientas para ayudar en el desarrollo:

* sweetalert2: Libreria de JS que ayuda mucho a mejorar la estetica de las alertas
* swiperjs: Increible libreria de JS que ayuda a hacer sliders de todo tipo con mucha customizacion, se usa en la mayoria de sliders de la aplicación
* jquery: Libreria de JS usada en varios casos de la pagina como:
  * Formularios de compra de entradas y publicar reseñas 
  * Slideshow de imagenes

## Autor

Toda la aplicación a sido diseñada y programada por mi cuenta, si tienes alguna pregunta mi email publico es alejandrogomezguillen9@gmail.com

## Uso de la IA en el proyecto

Mientras que he usado IA para debugear problemas con el codigo y para explicaciones teoricas cuando era necesario (En este proyecto he aprendido desde 0 que es una arquitectura MVC, como programar una API
y funcionamientos complejos de Angular) todo el codigo que se a insertado a sido escrito manualmente, modificado para acomodarse al proyecto o insertado desde foros de internet (como Stack Overflow)

## Links y dependencias

* [sweetalert2](https://sweetalert2.github.io/)
* [swiperjs](https://swiperjs.com/)
* [jquery](https://jquery.com/)

# Documentación

Aqui dejo la documentación de las clases y funciones mas importantes del proyecto, junto a diagramas cuando sea necesario

## Documentación de router.php
Al usar una arquitecutra MVC, el proyecto usa un router para construir de forma dinamica los links que llaman a un controlador y a su metodo indicado (que son archivos de php)

Si detecta que el controlador o metodo indicado no existe o devuelve un error (como falta de permisos) se le notifica al usuario y se devuelve al indice de la pagina

Aqui dejo un diagrama explicando el funcionamiento del router:


## Documentación JavaScript

Los archivos mas importantes se encuentran en /public/scripts, en el resto del proyecto existen algunas lines de js sueltas (como el slideshow de imagenes en home.php)

* Clase comprobador
Se encuentra en /public/scripts/control.js, se encarga de la comprobación de formularios para la pagina web (crear reseña, comprar entradas, crear cuenta e iniciar sesion) contiene las
siguientes funciones:

 * validarFormulario: Comprueba todos los errores que se han almacenado, luego los muestra por pantalla con un alert de sweetalert2
 * validarInputs: Valida si un input individual esta vacio
 * comprobarFormularios, comprobarTickets, comprobarReseña, comprobarRegistro: Funciones especificas para diferentes formularios de la aplicación

* alert.js
En este archivo se juntan todas las alertas de sweetalert2 que se usan en la pagina, todas las funciones se exportan y luego se van importando en las diferentes partes de la pagina donde se necesiten.
Las funciones siguen la misma logica, notifican el error y luego redirigen al usuario con .then()

