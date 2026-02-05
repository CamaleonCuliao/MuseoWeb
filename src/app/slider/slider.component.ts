import { Component, Input } from '@angular/core';
import { url } from 'inspector';
import { NgForOf } from "@angular/common";

@Component({
  selector: 'app-slider',
  standalone: true,
  imports: [NgForOf],
  templateUrl: './slider.component.html',
})
export class SliderComponent {

  imagenes = [
    { url: "assets/img/museos/arqAlicante.jpg", titulo: "Museo de arqueologia de Alicante" },
    { url: "assets/img/museos/arqMurcia.jpg", titulo: "Museo de arqueologia de Murcia" },
    { url: "assets/img/museos/artAlicante.jpg", titulo: "Museo de bellas arte de Alicante" },
    { url: "assets/img/museos/artMurcia.jpg", titulo: "Museo de bellas arte de Murcia" },
  ]

  index = 0;

  siguiente() {
    this.index = (this.index + 1) % this.imagenes.length;
  }

  anterior() {
    this.index = (this.index - 1 + this.imagenes.length) % this.imagenes.length;
  }
  
}
