import { Component, OnInit } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { ApiService } from './api.service';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, HeaderComponent, FooterComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
})
export class AppComponent implements OnInit{
  title = "Indice";

  constructor(private apiService: ApiService) {}

  ngOnInit(){
    this.apiService.loadMuseos()
    this.apiService.loadMonumentos()
    this.apiService.loadExposiciones()
    this.apiService.loadVisitass()
  }
  
}
