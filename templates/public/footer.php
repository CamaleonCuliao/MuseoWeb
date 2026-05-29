<footer>
    <div>
        <h1>Footer</h1>

        <span id="span"></span>

        <span id="info-conexion">Cargando información...</span>
    </div>
</footer>

<script>
    var span = document.getElementById('span');

    //Recoge la funcion time y la hora, minuto y segundos actuales
    function time() {
    var d = new Date();
    var s = d.getSeconds();
    var m = d.getMinutes();
    var h = d.getHours();
    //Establece el contenido inerno del span como la hora actual
    span.textContent = 
        ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
    }

    //Cada segundo, se llama esta funcion para actualizar la hora
    setInterval(time, 1000);

    //Se declara la funcion de manera asincrona
    async function mostrarUbicacion() {
    function mostrarUbicacion() {
      var span = document.getElementById('info-conexion');
      var ajax = new XMLHttpRequest();

      //Se abre una peticion a ipapi, que devuelve la informacion del usuario en forma de json
      ajax.open('GET', 'https://ipapi.co/json/', true);

      //Cuando esta carga, se cambiar la informacion interna del span
      ajax.onload = function () {
        var data = JSON.parse(ajax.responseText);

        span.innerHTML = 'País:' + data.country_name   + ' (' + data.country_code + ')'
      };

      //Por ultimo se manda la informacion
      ajax.send();
    }

    //Y se llama a ella misma
    mostrarUbicacion();
    }

    mostrarUbicacion();
</script>