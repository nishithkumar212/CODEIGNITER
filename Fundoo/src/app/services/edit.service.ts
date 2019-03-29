import { Injectable } from '@angular/core';
// import {Edit} from '../Models/edit'
import { ServiceUrlService } from '../serviceUrl/service-url.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class EditService {

  constructor(private serviceurl: ServiceUrlService,private http:HttpClient) { }
  update(value,id)
  {
    debugger;
    let data=new FormData();
    data.append("etitle",value.ftitle);
    data.append("edescription",value.fdescription);
    data.append("eid",id);
     return this.http.post(this.serviceurl.host+this.serviceurl.noteedit,data);
  }
  delete(value,id)
  {

    debugger;
    let dataa=new FormData();
    dataa.append("eid",id);
    return this.http.post(this.serviceurl.host+this.serviceurl.deletenote,dataa);
  }
  editcolor(value,id)
  {
    debugger
    let colordata=new FormData();
    colordata.append('setcolor',value);
    colordata.append('setid',id);
    return this.http.post(this.serviceurl.host+this.serviceurl.setcolor,colordata);
  }
}
