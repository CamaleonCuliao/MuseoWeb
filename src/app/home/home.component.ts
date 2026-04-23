import { Component } from '@angular/core';
import { CajaComponent } from '../caja/caja.component';
import { ApiService } from '../api.service';
import { RouterModule } from '@angular/router';
import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [ RouterModule, CajaComponent],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css',
  schemas: [CUSTOM_ELEMENTS_SCHEMA],
})

export class HomeComponent{
  alturaCaja="300"
  anchuraCaja="auto"
  alturaArte="400"
  anchuraArte="80%"
  alturaMonumento="400"
  anchuraMonumento="100%"
  r1="100%"
  r2="100%"

  museos: any[] = this.apiService.museos;
  exposiciones: any[] = this.apiService.exposiciones;
  visitas: any[] = this.apiService.visitas;
  monumentos: any[] = this.apiService.monumentos;

  constructor(private apiService: ApiService) {}
}
