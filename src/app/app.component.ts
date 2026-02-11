import { Component } from '@angular/core';
import { NgForOf } from "@angular/common";
import { RouterOutlet } from '@angular/router';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { SliderComponent } from './slider/slider.component';
import { CajaComponent } from './caja/caja.component';
//import { SwiperModule } from '../../node_modules/swiper/swiper';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, HeaderComponent, FooterComponent, SliderComponent, CajaComponent, NgForOf, /*SwiperModule*/],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'web-museo';

  cantidad = [
    "cosa", "cosa", "cosa", "cosa"
  ];
}
