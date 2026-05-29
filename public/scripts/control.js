import { errorControlador } from './alerts.js';

class comprobador {
    constructor(id) {
        this.valido = true;
        this.mensaje = 'A ocurrido un error en el formulario';
        this.form = document.getElementById(id);
        this.errores = [];
    }

    //Funciones para comprobacion de formularios
    comprobarFormularios(e) {
        this.valido = true;
        const inputs = this.form.querySelectorAll('input, select, textarea');

        this.validarInputs(inputs);

        this.mensaje = 'Todos los inputs deben de estar escritos';

        this.validarFormulario(e)
    }

    comprobarTickets(e) {
        this.valido = true;
        const cantidad = this.form.querySelector('input[name="cantidad"]');

        if (cantidad.value.trim() === '') {
            this.valido = false;
            this.errores.push('El campo "cantidad" no puede estar vacio');
        } else {
            let cantidad_int = parseInt(cantidad.value)

            if (cantidad_int <= 0) {
                this.valido = false;
                this.errores.push('Debes comprar como minimo una entrada');
            } else if (cantidad_int > 10) {
                this.valido = false;
                this.errores.push('No puedes comprar mas de 10 entradas a la vez');
            }
        }

        this.validarFormulario(e)
    }

    comprobarReseña(e) {
        this.valido = true;
        const inputs = this.form.querySelectorAll('input, select, textarea');

        const titulo = this.form.querySelector('input[name="titulo"]');
        const cuerpo = this.form.querySelector('textarea[name="cuerpo"]');

        this.validarInputs(inputs);

        let longitud_titulo = titulo.value.trim().length;
        let longitud_cuerpo = cuerpo.value.trim().length;

        if (longitud_titulo > 0 && longitud_titulo < 3) {
            this.errores.push('El titulo debe de tener una longitud minima de 3 letras')
        }

        if (longitud_cuerpo > 0 && longitud_cuerpo < 10) {
            this.errores.push('El cuerpo debe de tener una longitud minima de 10 letras')
        }

        this.validarFormulario(e)
    }

    comprobarRegistro(e) {
        this.valido = true;
        const inputs = this.form.querySelectorAll('input, select, textarea');

        const nombre = this.form.querySelector('input[name="nombre"]');
        const email = this.form.querySelector('input[name="email"]');
        const contrasenna = this.form.querySelector('input[name="contrasenna"]');

        this.validarInputs(inputs);

        this.comprobarContrasenna(contrasenna)

        this.validarFormulario(e)
    }

    //Funciones de utilidad
    validarInputs(inputs) {
        inputs.forEach(input => {
            if (this.validarInput(input)) {
                this.errores.push(`El campo "${input.name}" está vacío`);
            }
        });
    }

    validarInput(input) {
        switch (input.type) {
            case 'checkbox':
            case 'radio':
                return !input.checked;

            case 'file':
                return input.files.length === 0;

            default: // text, email, password, number, textarea...
                return input.value.trim() === '';
        }
    }

    comprobarContrasenna(input) {
        if (input.value.length < 5) {
            this.errores.push("La contraseña debe tener un minimo de 5 caracter")
        }

        const patterns = [
            { pattern: '.{5,}', mensaje: 'La contraseña debe de tener un minimo de 5 caracteres' },
            { pattern: '[A-Z]', mensaje: 'La contraseña debe de tener como minmo una letra en mayuscula' },
            { pattern: '[0-9]', mensaje: 'La contraseña debe de tener como minimo un numero' },
            { pattern: '[!@#$%^&*]', mensaje: 'La contraseña debe de tener un caracter' }
        ];

        patterns.forEach(elemento => {
            const regex = new RegExp(elemento.pattern);
            if (!regex.test(input.value)) {
                this.errores.push(elemento.mensaje);
            }
        })
    }

    //this.errores.join("\n")

    validarFormulario(e) {
        if (this.errores.length > 0) {
            e.preventDefault();
            Swal.fire({
                icon: "error",
                title: "Error",
                html: this.errores.join("<br>"),
                showConfirmButton: true,
            })
            this.errores = []
        }
    }
}

export { comprobador };