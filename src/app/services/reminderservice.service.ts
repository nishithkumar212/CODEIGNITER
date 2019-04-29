import { Injectable } from '@angular/core';
import { ServiceUrlService } from '../serviceUrl/service-url.service';
import { HttpClient } from '@angular/common/http';
import { debugOutputAstAsTypeScript } from '@angular/compiler';

@Injectable({
  providedIn: 'root'
})
export class ReminderserviceService {

  constructor(private serviceurl: ServiceUrlService,private http:HttpClient) { }
  selection(uid)
  {
    debugger;
    let selectreminder=new FormData();
    selectreminder.append("uid",uid.id);
    return this.http.post(this.serviceurl.host+this.serviceurl.reminder,selectreminder);
  }
  selection1(uid)
  {
    debugger;
    let selecttrash=new FormData();
    selecttrash.append("uid",uid.id);
    return this.http.post(this.serviceurl.host+this.serviceurl.archivedisplay,selecttrash);
  }
  insertion(value)
  {
    let rem=new FormData();
    rem.append("reminderdate",value);
    return this.http.post(this.serviceurl.host+this.serviceurl.reminder,rem);
  }
}
