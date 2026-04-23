import { Component } from '@angular/core';
import { ApiService } from '../api.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-register-page',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './register-page.component.html',
  styleUrl: './register-page.component.css'
})
export class RegisterPageComponent {
  user = {
    nombre: '',
    email : '',
    contrasenna: '',
    activo: 1
  };

  constructor(private apiService: ApiService) {}

  onSubmit(form: any){

    this.apiService.registerUser(this.user).subscribe({
      next: res => console.log('OK', res),
      error: err => console.error('Error', err)
    })
  }
}
