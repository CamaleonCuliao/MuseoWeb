import { Component } from '@angular/core';
import { ApiService} from '../api.service';
import { RouterModule } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CajaComponent } from '../caja/caja.component';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-detalles-museo',
  standalone: true,
  imports: [RouterModule, CajaComponent],
  templateUrl: './detalles-museo.component.html',
  styleUrl: './detalles-museo.component.css'
})
export class DetallesMuseoComponent {

  alturaCaja="300"
  anchuraCaja="100%"

  museos: any[] = [];
  exposiciones: any[] = [];
  exposiciones_museo: any[] = [];
  visitas: any[] = [];
  visitas_museo: any[] = [];
  monumentos: any[] = [];
  monumentos_museo: any[] = [];
  errorMessage: string = '';

  constructor(private apiService: ApiService, private route: ActivatedRoute) {}

  ngOnInit(): void {
    this.loadData()
  }

loadData() {
  const id = Number(this.route.snapshot.paramMap.get('id'));

  /* CODIGO DE IA, REEMPLAZAR */
  this.apiService.getOneMuseo(id).subscribe((museoData) => {
    this.museos = museoData.body;

    this.apiService.getExposiciones().subscribe((expData) => {
      this.exposiciones = expData.body;
      this.exposiciones_museo = this.exposiciones.filter(
        e => e.id_museo === this.museos[0].id
      );
    });

    this.apiService.getMonumentos().subscribe((monData) => {
      this.monumentos = monData.body;
      this.monumentos_museo = this.monumentos.filter(
        m => m.id_museo === this.museos[0].id
      );
    });

    this.apiService.getVisitas().subscribe((visData) => {
      this.visitas = visData.body;
      this.visitas_museo = this.visitas.filter(
        v => v.id_museo === this.museos[0].id
      );
    });

  });
}

}
