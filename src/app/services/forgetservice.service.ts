import { Injectable } from '@angular/core';
import { ServiceUrlService} from '../serviceUrl/service-url.service';
import {HttpClient} from  '@angular/common/http';
import {forgot} from '../Models/forgot';
@Injectable({
  providedIn: 'root'
})
export class ForgetserviceService {

  constructor( private http:HttpClient,private serviceurl: ServiceUrlService) { }
  forgotpass(forg:forgot)
  {
    debugger;
    let forgotuser=new FormData();
    forgotuser.append('email',forg.email);
    return this.http.post(this.serviceurl.host+this.serviceurl.forgot,forgotuser)
  }
}
