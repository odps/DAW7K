import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse } from '@angular/common/http';
import { Observable } from 'rxjs';
import { ILibro } from '../interfaces/ilibro';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root',
})
export class DatosLibrosService {
  constructor(private _http: HttpClient) {}

  public getDatos(): Observable<HttpResponse<ILibro[]>> {
    return this._http.get<ILibro[]>(`${environment.apiUrl}/api/libros`, {
      observe: 'response',
    });
  }

  public createLibro(datos: any): Observable<HttpResponse<ILibro[]>> {
    return this._http.post<ILibro[]>(`${environment.apiUrl}/api/libro`, datos, {
      observe: 'response',
    });
  }
}
