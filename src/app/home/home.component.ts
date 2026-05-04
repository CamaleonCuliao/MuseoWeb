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
  museos: any[] = [];
  monumentos: any[] = [];
  visitas: any[] = [];
  exposiciones: any[] = [];

  alturaCaja="300"
  anchuraCaja="auto"
  alturaArte="400"
  anchuraArte="80%"
  alturaMonumento="400"
  anchuraMonumento="100%"
  r1="100%"
  r2="100%"

  constructor(private apiService: ApiService) {}

  ngOnInit() {    
    this.apiService.getMuseos().subscribe(data => {
      this.museos = data.body;
    });

    this.apiService.getExposiciones().subscribe(data => {
      this.exposiciones = data.body;
    });

    this.apiService.getMonumentos().subscribe(data => {
      this.monumentos = data.body;
    });

    this.apiService.getVisitas().subscribe(data => {
      this.visitas = data.body;
    });
  }
}
