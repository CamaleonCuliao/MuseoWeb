import { Injectable, Input } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, firstValueFrom } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  errorMessage: string = '';

  private baseUrl = 'http://192.168.18.42:3000/'; // Example API URL
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

  //Funciones de registro e inicio de sesion
  registerUser(user_body: any): Observable<any>{
    return this.http.post(`${this.baseUrl}api/auth`, user_body);
  }

  loginUser(user_body: any): Observable<any>{
    return this.http.post(`${this.baseUrl}api/login`, user_body);
  }

  /*
  loadExposiciones(): void {
    this.getExposiciones().subscribe(
      (data) => {
        this.exposiciones = data.body;
      },
      (error) => {
        this.errorMessage = 'A ocurrido un error al cargar los archivos';
      }
    );
  }

  loadVisitass(): void {
    this.getVisitas().subscribe(
      (data) => {
        this.visitas = data.body;
      },
      (error) => {
        this.errorMessage = 'A ocurrido un error al cargar los archivos';
      }
    );
  }

  loadMonumentos(): void {
    this.getMonumentos().subscribe(
      (data) => {
        this.monumentos = data.body;
      },
      (error) => {
        this.errorMessage = 'A ocurrido un error al cargar los archivos';
      }
    );
  }*/
}