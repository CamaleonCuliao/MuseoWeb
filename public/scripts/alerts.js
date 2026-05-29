function errorControlador(){
    Swal.fire({
        title: "Error de controlador",
        text: "No se a encontrado el controlador indicado",
        icon: "error"
    }).then((result) => {
        window.location.href = 'router.php?controller=home&method=showIndex'
    });
}

function errorMetodo(){
    Swal.fire({
        title: "Error de metodo",
        text: "No se a encontrado el metodo indicado",
        icon: "error"
    }).then((result) => {
        window.location.href = 'router.php?controller=home&method=showIndex'
    });
}

function errorId(){
    Swal.fire({
        title: "Museo no encontrado",
        text: "Este museo no esta registrado en la pagina",
        icon: "error"
    }).then((result) => {
        window.location.href = 'router.php?controller=home&method=showIndex'
    });
}

function errorNombreTabla(){
    Swal.fire({
        title: "Error de tabla",
        text: "La tabla indicada en la url no existe",
        icon: "error"
    }).then((result) => {
        window.location.href = 'router.php?controller=home&method=showIndex'
    });
}

function alertCerrarSesion(){
    Swal.fire({
        icon: "success",
        title: "Sesion cerrada correctamente",
        showConfirmButton: true,
        timer: 1500
    }).then((result) => {
        window.location.href = 'router.php?controller=home&method=showIndex'
    });
}

function alertIniciarSesion(){
    Swal.fire({
        icon: "success",
        title: "Sesion iniciada correctamente",
        showConfirmButton: true,
        timer: 1500
    }).then((result) => {
        window.location.href = 'router.php?controller=home&method=showIndex'
    });
}

function errorCrearCuenta() {
    Swal.fire({
        icon: "error",
        title: "Error al crear la cuenta",
        text: "El usuario indicado ya existe",
        showConfirmButton: true,
    }).then((result) => {
        window.location.href = 'router.php?controller=auth&method=showLogin'
    });
}

function errorIniciarSesion() {
    Swal.fire({
        icon: "error",
        title: "Error al iniciar sesion",
        text: "El usuario indicado no existe",
        showConfirmButton: true,
    }).then((result) => {
        window.location.href = 'router.php?controller=auth&method=showLogin'
    });
}

function cuentaCreada() {
    Swal.fire({
        icon: "success",
        title: "Cuenta creada exitosamente",
        showConfirmButton: true,
    }).then((result) => {
        window.location.href = 'router.php?controller=auth&method=showLogin'
    });
}
export { errorControlador, errorMetodo, errorId, errorNombreTabla, alertCerrarSesion, alertIniciarSesion, errorCrearCuenta, cuentaCreada, errorIniciarSesion };