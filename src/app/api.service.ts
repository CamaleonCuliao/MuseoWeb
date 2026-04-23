import { Injectable, Input } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Interface } from 'node:readline';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  museos: any[] = [];
  monumentos: any[] = [];
  visitas: any[] = [];
  exposiciones: any[] = [];
  errorMessage: string = '';

  private baseUrl = 'http://localhost:3000/'; // Example API URL
  constructor(private http: HttpClient) {}
  // Getters
  getMuseos(): Observable<any> {
    return this.http.get(`${this.baseUrl}api/museo`);
  }

  getOneMuseo(id: number):Observable<any>{
    return this.http.get(`${this.baseUrl}api/museo/`+id);
  }

  getExposiciones(): Observable<any> {
    return this.http.get(`${this.baseUrl}api/exposicion`);
  }

  getVisitas(): Observable<any> {
    return this.http.get(`${this.baseUrl}api/visita_guiada`);
  }

  getMonumentos(): Observable<any> {
    return this.http.get(`${this.baseUrl}api/monumento`);
  }

  registerUser(user_body: any): Observable<any>{
    return this.http.post(`${this.baseUrl}api/usuarios`, user_body);
  }

  loadMuseos(): void {
    this.getMuseos().subscribe(
      (data) => {
        this.museos = data.body;
      },
      (error) => {
        console.error('Error museos:', error);
      }
    );
  }

  loadExposiciones(): void {
    this.getExposiciones().subscribe(
      (data) => {
        this.exposiciones = data.body;
      },
      (error) => {
        this.errorMessage = 'An error occurred while fetching posts.';
      }
    );
  }

  loadVisitass(): void {
    this.getVisitas().subscribe(
      (data) => {
        this.visitas = data.body;
      },
      (error) => {
        this.errorMessage = 'An error occurred while fetching posts.';
      }
    );
  }

  loadMonumentos(): void {
    this.getMonumentos().subscribe(
      (data) => {
        this.monumentos = data.body;
      },
      (error) => {
        this.errorMessage = 'An error occurred while fetching posts.';
      }
    );
  }
}