import { Component, inject } from '@angular/core';
import { ApiService } from '../api.service';
import { AuthService } from '../auth.service';
import { FormControl, FormsModule, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login-page',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './login-page.component.html',
  styleUrl: './login-page.component.css'
})
export class LoginPageComponent {
  private router = inject(Router)

  user = {
    email : '',
    contrasenna: ''
  };

  constructor(private apiService: ApiService, private AuthService: AuthService) {}

  onSubmit(form: any){
    const control = new FormControl(this.user.email, Validators.email)

    if(this.user.email == "" || this.user.contrasenna == ""){
      alert("Todos los campos deben de estar rellenados")
    } else if(control.errors){
      alert("El email debe de tener un formato valido")
    } else{
      this.AuthService.login(this.user);
      this.router.navigate([""])
      //window.location.reload();
    }
    
  }
}
