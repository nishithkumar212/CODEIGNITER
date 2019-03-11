import { Injectable } from '@angular/core';
import { ServiceUrlService} from '../serviceUrl/service-url.service';
import {HttpClient} from  '@angular/common/http';
import {reset} from '../Models/reset';
import { ActivatedRoute } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class ResetService {

  constructor(private http:HttpClient,private service:ServiceUrlService,private route: ActivatedRoute) { }

  getEmail(){
      let email = new FormData();
      email.append("token",this.route.snapshot.queryParamMap.get("token"));
      return this.http.post(this.service.host+this.service.getemail,email);
  }


  resetpassword(Reset:reset)
  {
    
  let user=new FormData();
  user.append('password',Reset.password);
  user.append("token",this.route.snapshot.queryParamMap.get("token"));
    return  this.http.post(this.service.host+this.service.reset,user);
 }

}
