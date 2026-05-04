import { Component, inject } from '@angular/core';
import { ApiService } from '../api.service';
import { FormControl, FormsModule, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-register-page',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './register-page.component.html',
  styleUrl: './register-page.component.css'
})
export class RegisterPageComponent {

  private router = inject(Router)

  user = {
    nombre: '',
    email : '',
    contrasenna: '',
    activo: 1
  };

  constructor(private apiService: ApiService) {}

  onSubmit(form: any){
    const control = new FormControl(this.user.email, Validators.email)
    console.log(this.user.nombre)
    if(this.user.nombre == "" || this.user.email == "" || this.user.contrasenna == ""){
      alert("Todos los campos deben de estar rellenados")
    } else if(control.errors){
      alert("El email debe de tener un formato valido")
    } else{
      this.apiService.registerUser(this.user).subscribe({
        next: res => console.log('OK', res),
        error: err => console.error('Error', err)
      })
      alert("Usuario creado correctamente")
      this.router.navigate([""])
    }
    
  }
}
