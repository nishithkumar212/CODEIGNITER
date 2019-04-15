import { Injectable } from '@angular/core';
import {HttpClient} from  '@angular/common/http';
import {Login } from '../Models/login';
import {ServiceUrlService} from '../serviceUrl/service-url.service'
@Injectable({
  providedIn: 'root'
})
export class LoginService 
{
  constructor(private http:HttpClient,private serverurl:ServiceUrlService) 
  {

   }
login(login:Login)
{
  debugger;
  let loginuser=new FormData();
  loginuser.append('email',login.email);
  loginuser.append('password',login.password);
   return this.http.post(this.serverurl.host+this.serverurl.login,loginuser);
}
socialLoginData(email, name,image) {
  let socialLoginData = new FormData();
  socialLoginData.append("email", email);
  socialLoginData.append("name", name);
  socialLoginData.append("image",image);
  return this.http.post(
    this.serverurl.host + this.serverurl.sociallogindata,
    socialLoginData
  );
}

imageinsertion(email,image)
{
  debugger;
  let imageuser=new FormData();
    imageuser.append("email",email);
    imageuser.append("image",image);
    return this.http.post(this.serverurl.host+this.serverurl.imageinsertion,imageuser);
}
}
