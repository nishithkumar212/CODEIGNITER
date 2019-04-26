import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Register } from '../Models/register';
import {ServiceUrlService} from '../serviceUrl/service-url.service';
@Injectable({
  providedIn: 'root'
})
export class RegisterService {
  
  constructor(private http: HttpClient,private serviceurl : ServiceUrlService) { }
  
  registeruser(register:Register)
  {
    debugger;
    let createuser=new FormData();
    createuser.append("firstname",register.firstname);
    createuser.append("lastname",register.lastname);
    createuser.append("email",register.email);
    createuser.append("password",register.password);
    return  this.http.post(this.serviceurl.host+this.serviceurl.register,createuser);
  }

}

