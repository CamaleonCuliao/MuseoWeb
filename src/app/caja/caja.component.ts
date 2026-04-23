import { Component, Input  } from '@angular/core';
import { NgStyle, CommonModule } from "@angular/common";
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-caja',
  standalone: true,
  imports: [NgStyle, CommonModule, RouterModule ],
  templateUrl: './caja.component.html'
})
export class CajaComponent {
  
  @Input() titulo: string = '';
  @Input() anchura: string = '';
  @Input() altura: string = '';
  @Input() imagen: string = '';
  @Input() r1: string = '';
  @Input() r2: string = '';
  @Input() id: number = 0;
}
