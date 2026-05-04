import { Component } from '@angular/core';
import { RouterModule } from '@angular/router';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [RouterModule],
  templateUrl: './header.component.html',
})
export class HeaderComponent {

  constructor(private AuthService: AuthService){}

  menuAbierto = false

  cosa: any = localStorage.getItem('id_sesion')

  toggleMenu(): void {
    this.menuAbierto = !this.menuAbierto;
  }

  cerrarSesion(): void{
    this.AuthService.logout();
  }

}
