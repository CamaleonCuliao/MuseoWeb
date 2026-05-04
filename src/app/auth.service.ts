import { Injectable } from '@angular/core';
import { ApiService } from './api.service';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private apiService: ApiService) {}

  getAuth(){
    console.log(localStorage.getItem('id_sesion'));
  }

  setAuth(authResult: any){
    localStorage.setItem('id_sesion', authResult.id_token);
    localStorage.setItem('expiraEn', authResult.expiraEn)
    this.getAuth();
  }

  //Si el usuario existe crea los items id_token (jwt) y tiempo de expiracion en el localStorage
  login(user: any){
    this.apiService.loginUser(user).subscribe({
        next: res => {
          const authResult = res.body;
          this.setAuth(authResult);
        },

        error: err => [alert("Email o contraseña incorrecta"), console.log(err)]
    })
  }

  logout(){
    localStorage.removeItem('id_sesion')
    localStorage.removeItem('expiraEn')
  }

  isLoged(){
    return localStorage.getItem('id_sesion')
  }
  
}
