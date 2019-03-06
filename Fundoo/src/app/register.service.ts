import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Register } from 'Models/register';

@Injectable({
  providedIn: 'root'
})
export class RegisterService {
  serverurl: string = "http://localhost/codeigniter/register";
  constructor(private http: HttpClient) { }

  registeruser(register:Register)
  {
    debugger;
    let createuser=new FormData();
    createuser.append("firstname",register.firstname);
    createuser.append("lastname",register.lastname);
    createuser.append("email",register.email);
    createuser.append("password",register.password);
    createuser.append("confirmpassword",register.confirmpassword);
    this.http.post(this.serverurl,createuser);
  }
}

