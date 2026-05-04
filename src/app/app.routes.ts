import { Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { DetallesMuseoComponent } from './detalles-museo/detalles-museo.component';
import { RegisterPageComponent } from './register-page/register-page.component';
import { LoginPageComponent } from './login-page/login-page.component';

export const routes: Routes = [
    {
        path: '',
        component: HomeComponent,
        title: 'Indice'
    },

    {
        path: 'detalles-museo/:id',
        component: DetallesMuseoComponent,
        title: 'Detalles Museo'
    },

    {
        path: 'registro',
        component: RegisterPageComponent,
        title: 'Registro de cuenta'
    },

    {
        path: 'inicio',
        component: LoginPageComponent,
        title: 'Iniciar sesion'
    }
];
