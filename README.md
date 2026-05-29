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
  * * Formularios de compra de entradas y publicar reseñas 
  * * Slideshow de imagenes

## Autor

Toda la aplicación a sido diseñada y programada por mi cuenta, si tienes alguna pregunta mi email publico es alejandrogomezguillen9@gmail.com

## Links y dependencias

Inspiration, code snippets, etc.
* [sweetalert2](https://sweetalert2.github.io/)
* [swiperjs](https://swiperjs.com/)
* [jquery](https://jquery.com/)
