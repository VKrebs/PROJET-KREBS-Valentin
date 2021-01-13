import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpErrorResponse } from '@angular/common/http';

import { Observable } from 'rxjs';
import { filter, map, mergeAll } from 'rxjs/operators';

import { Product } from '../../models/product';
import { environment } from '../../../../environments/environment';

@Injectable({
  providedIn: 'root', 
})
export class ProductsApiService {

  constructor(private http:HttpClient) { }
  public getProducts () : Observable<Product[]>
  {
    let body:URLSearchParams = new URLSearchParams();

    let httpOptions = {
      headers: new HttpHeaders({
        'Content-Type':  'application/x-www-form-urlencoded'
      })
    };

    return this.http.post<Product[]>(environment.backendAccounts + "api/product/all", body.toString(), httpOptions);
  }

  public getProductById (id:number) : Observable<Product>
  {
    let body:URLSearchParams = new URLSearchParams();
    body.set("id", JSON.stringify(id));

    let httpOptions = {
      headers: new HttpHeaders({
        'Content-Type':  'application/x-www-form-urlencoded'
      })
    };

    return this.http.post<Product>(environment.backendAccounts + "api/product/id", body.toString(), httpOptions);
  }
}
