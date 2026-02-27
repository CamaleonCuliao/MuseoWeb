import { Component } from '@angular/core';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';

/*
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { faCoffee } from '@fortawesome/free-solid-svg-icons';
import { SwiperModule } from '../../node_modules/swiper/swiper';
*/
@Component({
  selector: 'app-root',
  standalone: true,
  imports: [/*FontAwesomeModule*/ HeaderComponent, FooterComponent ],
  templateUrl: './app.component.html'
})
export class AppComponent {

}
