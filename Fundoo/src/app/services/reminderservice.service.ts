import { Injectable } from '@angular/core';
import { ServiceUrlService } from '../serviceUrl/service-url.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ReminderserviceService {

  constructor(private serviceurl: ServiceUrlService,private http:HttpClient) { }
  selection()
  {
    return this.http.get(this.serviceurl.host+this.serviceurl.reminder);
  }
  insertion(value)
  {
    let rem=new FormData();
    rem.append("reminderdate",value);
    return this.http.post(this.serviceurl.host+this.serviceurl.reminder,rem);
  }
}
