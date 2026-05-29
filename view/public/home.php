<div class="slideshow-wrapper">
  <div class="slides-track" id="track">

    <div class="slide active">
      <div class="slide-bg main_slider"></div>
      <div class="slide-overlay"></div>
      <div class="slide-content">
        <h1>Visita el Museo Arqueológico de Alicante</h1>
      </div>
    </div>

    <div class="slide">
      <div class="slide-bg murcia"></div>
      <div class="slide-overlay"></div>
      <div class="slide-content">
        <h1>Visita la Catedral de Murcia </h1>
      </div>
    </div>
  </div>
</div>

<section class="home">
  <section class="main_alicante slider">
    <h1>Museos regionales de Alicante</h1>
    <section class="swiper">
      <div class="swiper-wrapper">
        <?php
        $primero = true;
        while ($row = $alicante->fetch(PDO::FETCH_ASSOC)) {
          if ($row['id_provincia'] == 1) {

            renderizarCaja($row['imagen'], $row['nombre'], $row['id'], 'museo');

            $primero = false;
          }
        }
        ?>
      </div>
    </section>
  </section>

  <section class="main_alicante slider">
    <h1>Museos regionales de Murcia</h1>
    <section class="swiper">
      <div class="swiper-wrapper">
        <?php
        $primero = true;
        while ($row = $murcia->fetch(PDO::FETCH_ASSOC)) {
          if ($row['id_provincia'] == 2) {

            renderizarCaja($row['imagen'], $row['nombre'], $row['id'], 'museo');

            $primero = false;
          }
        }
        ?>
      </div>
    </section>
  </section>

  <section class="main_intermedio">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
        <path fill="rgb(255, 255, 255)" d="M463 448.2C440.9 409.8 399.4 384 352 384L288 384C240.6 384 199.1 409.8 177 448.2C212.2 487.4 263.2 512 320 512C376.8 512 427.8 487.3 463 448.2zM64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320zM320 336C359.8 336 392 303.8 392 264C392 224.2 359.8 192 320 192C280.2 192 248 224.2 248 264C248 303.8 280.2 336 320 336z" />
      </svg>
      <p>Crea una cuenta</p>
    </div>

    <div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
        <path fill="rgb(255, 255, 255)" d="M335.9 84.2C326.1 78.6 314 78.6 304.1 84.2L80.1 212.2C67.5 219.4 61.3 234.2 65 248.2C68.7 262.2 81.5 272 96 272L128 272L128 480L128 480L76.8 518.4C68.7 524.4 64 533.9 64 544C64 561.7 78.3 576 96 576L544 576C561.7 576 576 561.7 576 544C576 533.9 571.3 524.4 563.2 518.4L512 480L512 272L544 272C558.5 272 571.2 262.2 574.9 248.2C578.6 234.2 572.4 219.4 559.8 212.2L335.8 84.2zM464 272L464 480L400 480L400 272L464 272zM352 272L352 480L288 480L288 272L352 272zM240 272L240 480L176 480L176 272L240 272zM320 160C337.7 160 352 174.3 352 192C352 209.7 337.7 224 320 224C302.3 224 288 209.7 288 192C288 174.3 302.3 160 320 160z" />
      </svg>
      <p>Visita un museo</p>
    </div>

    <div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
        <path fill="rgb(255, 255, 255)" d="M262.8 65.8C271.8 62.1 282.1 64.1 289 71L345 127C354.4 136.4 354.4 151.6 345 160.9L289 216.9C282.1 223.8 271.8 225.8 262.8 222.1C253.8 218.4 248 209.7 248 200L248 176L224 176C206.3 176 192 190.3 192 208L192 422.7C220.3 435 240 463.2 240 496C240 540.2 204.2 576 160 576C115.8 576 80 540.2 80 496C80 463.2 99.7 435 128 422.7L128 208C128 155 171 112 224 112L248 112L248 88C248 78.3 253.8 69.5 262.8 65.8zM456 144C456 157.3 466.7 168 480 168C493.3 168 504 157.3 504 144C504 130.7 493.3 120 480 120C466.7 120 456 130.7 456 144zM448 217.3C419.7 205 400 176.8 400 144C400 99.8 435.8 64 480 64C524.2 64 560 99.8 560 144C560 176.8 540.3 205 512 217.3L512 432C512 485 469 528 416 528L392 528L392 552C392 561.7 386.2 570.5 377.2 574.2C368.2 577.9 357.9 575.9 351 569L295 513C285.6 503.6 285.6 488.4 295 479.1L351 423.1C357.9 416.2 368.2 414.2 377.2 417.9C386.2 421.6 392 430.3 392 440L392 464L416 464C433.7 464 448 449.7 448 432L448 217.3zM136 496C136 509.3 146.7 520 160 520C173.3 520 184 509.3 184 496C184 482.7 173.3 472 160 472C146.7 472 136 482.7 136 496z" />
      </svg>
      <p>Ponle una reseña</p>
    </div>
  </section>

  <section class="main_exposiciones slider">
    <h1>Exposiciones de arte</h1>
    <section class="swiperExposiciones">
      <div class="swiper-wrapper">
        <?php
        while ($row = $exposiciones->fetch(PDO::FETCH_ASSOC)) {
          renderizarCaja($row['imagen'], '', $row['id'], 'exposiciones');
        }
        ?>
      </div>
    </section>
  </section>

  <section class="main_visitas slider">
    <h1>Visitas guiadas</h1>
    <div class="grid">
      <div class="uno">
        <a href="router.php?controller=detallesGeneral&method=showIndex&id=1&tablename=visitas_guiadas" id="je"> <h1>Visita educativa de Alicante</h1> </a> 
        
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ipsum dignissimos expedita excepturi obcaecati iste! Accusamus voluptatum alias quam sint assumenda, consectetur ratione commodi nulla rerum at nisi eligendi deserunt?</p>
        <img src="<?php echo BASE_URL . 'img/alicante_visita_educativa.png';?>" alt="">
      </div>

      <div class="dos">
        <a href="router.php?controller=detallesGeneral&method=showIndex&id=6&tablename=visitas_guiadas" id="je"> <h1>Visitas guiadas en Murcia</h1> </a> 
        
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ipsum dignissimos expedita excepturi obcaecati iste! Accusamus voluptatum alias quam sint assumenda, consectetur ratione commodi nulla rerum at nisi eligendi deserunt?</p>
        <img src="<?php echo BASE_URL . 'img/visitas_guiadas_murcia.jpg';?>" alt="">
      </div>

      <div class="tres">
        <a href="router.php?controller=detallesGeneral&method=showIndex&id=4&tablename=visitas_guiadas" id="je"> <h1>Visita virtual de Murcia</h1> </a> 
        
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ipsum dignissimos expedita excepturi obcaecati iste! Accusamus voluptatum alias quam sint assumenda, consectetur ratione commodi nulla rerum at nisi eligendi deserunt?</p>
        <img src="<?php echo BASE_URL . 'img/murcia_visita_virtual.jpg';?>"  alt="">
      </div>
    </div>
  </section>

  <section class="main_intermedio">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
        <path fill="rgb(255, 255, 255)" d="M576 304C576 436.5 461.4 544 320 544C282.9 544 247.7 536.6 215.9 523.3L97.5 574.1C88.1 578.1 77.3 575.8 70.4 568.3C63.5 560.8 62 549.8 66.8 540.8L115.6 448.6C83.2 408.3 64 358.3 64 304C64 171.5 178.6 64 320 64C461.4 64 576 171.5 576 304z" />
      </svg>
      <p>Comenta con otros usuarios</p>
    </div>

    <div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
        <path fill="rgb(255, 255, 255)" d="M128 128C92.7 128 64 156.7 64 192L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 192C576 156.7 547.3 128 512 128L128 128zM320 224C373 224 416 267 416 320C416 373 373 416 320 416C267 416 224 373 224 320C224 267 267 224 320 224zM512 248C512 252.4 508.4 256.1 504 255.5C475 251.9 452.1 228.9 448.5 200C448 195.6 451.6 192 456 192L504 192C508.4 192 512 195.6 512 200L512 248zM128 392C128 387.6 131.6 383.9 136 384.5C165 388.1 187.9 411.1 191.5 440C192 444.4 188.4 448 184 448L136 448C131.6 448 128 444.4 128 440L128 392zM136 255.5C131.6 256 128 252.4 128 248L128 200C128 195.6 131.6 192 136 192L184 192C188.4 192 192.1 195.6 191.5 200C187.9 229 164.9 251.9 136 255.5zM504 384.5C508.4 384 512 387.6 512 392L512 440C512 444.4 508.4 448 504 448L456 448C451.6 448 447.9 444.4 448.5 440C452.1 411 475.1 388.1 504 384.5z" />
      </svg>
      <p>Dona a los museos que mas te gusten</p>
    </div>
  </section>

  <section class="main_yacimientos slider">
    <h1>Yacimientos</h1>
    <div>
      <div class="uno">
        <a href="router.php?controller=detallesGeneral&method=showIndex&id=1&tablename=yacimientos" id="je"> <h1>Yacimiento de la Illeta</h1> </a> 
        <p>Yacimiento arqueológico de primer orden situado sobre un promontorio costero en el término municipal de El Campello. Ocupado de forma continua entre el 2200 a.C. y el siglo I a.C., el enclave fue en su momento un importante centro de intercambio comercial entre los pueblos mediterráneos. Se conservan restos de almacenes, viviendas, templos y zonas de producción que permiten reconstruir con detalle la vida de sus habitantes.</p>
        <img src="<?php echo BASE_URL . "img/alicante_yacimiento_illeta.jpg"; ?>" alt="Imagen del yacimiento de la Illeta" href="router.php?controller=detallesGeneral&method=showIndex&id=1&tablename=yacimientos">
      </div>

      <div class="dos">
        <a href="router.php?controller=detallesGeneral&method=showIndex&id=2&tablename=yacimientos"> <h1>Teatro romano de Cartagena</h1> </a> 
        <p>Descubierto en 1988 durante obras de rehabilitación urbana, el Teatro Romano de Cartagena es uno de los más grandes e importantes de Hispania. Construido entre los siglos I a.C. y I d.C., tenía capacidad para más de 7.000 espectadores. Tras décadas de excavación y restauración, el teatro fue abierto al público en 2008 y hoy es uno de los principales atractivos turísticos y culturales de la Región de Murcia.</p>
        <img src="<?php echo BASE_URL . "img/murcia_yacimiento_teatro.jpg"; ?>" alt="Imagen del teatro romano de Cartagena">
      </div>
    </div>

  </section>

  <section class="main_monumentos slider">
    <h1>Monumentos</h1>
    <section class="swiperMonumentos">
      <div class="swiper-wrapper">
        <?php
        while ($row = $monumentos->fetch(PDO::FETCH_ASSOC)) {
          renderizarCaja($row['imagen'], $row['nombre'], $row['id'], 'monumentos');
        }
        ?>
      </div>
    </section>
  </section>
</section>

</main>

<script>
  const swipers = document.querySelectorAll('.swiper');

  swipers.forEach((slider) => {
    new Swiper(slider, {
      loop: true,

      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 10,
        },

        1280: {
          slidesPerView: 5,
          spaceBetween: 10,
        },
      },
    });
  });

  const swiper = new Swiper('.swiperExposiciones', {
    // Optional parameters
    loop: true,
    slidesPerView: 1,
    spaceBetween: 30,

    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 30,
      },

      1280: {
        slidesPerView: 4,
        spaceBetween: 30,
      },
    },
  });

  const swiperMonumento = new Swiper('.swiperMonumentos', {
    // Optional parameters
    loop: true,
    slidesPerView: 1,
    spaceBetween: 30,

    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 30,
      },

      1280: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });

  //FUNCION DE SLIDER PRINCIPAL
$(function() {
  var $slides = $('.slide');
  var current = 0;

  setInterval(function() {
    var $current = $slides.eq(current);
    current = (current + 1) % $slides.length;
    var $next = $slides.eq(current);

    $current.fadeOut(600, function() {
      $next.addClass('active').fadeIn(600);
      $current.removeClass('active');
    });
  }, 5000);
});
</script>

