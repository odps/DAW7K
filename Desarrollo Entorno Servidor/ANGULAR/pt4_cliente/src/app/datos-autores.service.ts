import { Injectable } from '@angular/core';
import { IAutor } from './interfaces/iautor';
import {
  HttpClient,
  HttpClientModule,
  HttpResponse,
} from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../environments/environment';

@Injectable({
  providedIn: 'root',
})
export class DatosAutoresService {
  constructor(private _http: HttpClient) {}

  autores: IAutor[] = [
    { id: 1, nombre: 'Hermann', apellidos: 'Mayo' },
    { id: 2, nombre: 'Ketchup', apellidos: 'Heinz' },
    { id: 3, nombre: 'Johny', apellidos: 'Cash' },
  ];

  //incorporar al service de autores un servicio http
  public getDatos(): Observable<HttpResponse<IAutor[]>> {
    return this._http.get<IAutor[]>(environment.apiUrl + '/api/autores', {
      observe: 'response',
    }); //get retorna un observable
  }
}
