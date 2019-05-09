import { Injectable } from '@angular/core';
// import {Edit} from '../Models/edit'
import { ServiceUrlService } from '../serviceUrl/service-url.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class EditService {

  constructor(private serviceurl: ServiceUrlService,private http:HttpClient) { }
  update(values,id)
  {
    debugger;
    let data=new FormData();
    data.append("etitle",values.ftitle);
    data.append("edescription",values.fdescription);
    data.append("eid",id);
     return this.http.post(this.serviceurl.host+this.serviceurl.noteedit,data);
  }
  date(value)
  {
    let reminder=new FormData();
    reminder.append("reminder",value);
    return this.http.post(this.serviceurl.host+this.serviceurl.setcolor,reminder);
  }
  delete(value,id)
  {
    debugger;
    let dataa=new FormData();
    dataa.append("eid",id);
    //  dataa.append("email",token);
    return this.http.post(this.serviceurl.host+this.serviceurl.deletenote,dataa);
  }
  selectiondelete(uid)
  {
    debugger;
    let selectiondelete=new FormData();
    selectiondelete.append("uid",uid.id);
    return this.http.post(this.serviceurl.host+this.serviceurl.selectiondelete,selectiondelete);
  }
  editcolor(value,id)
  {
    debugger
    let colordata=new FormData();
    colordata.append("setcolor",value);
    colordata.append("setid",id);
    return this.http.post(this.serviceurl.host+this.serviceurl.setcolor,colordata);
  }
  setarchive(value)
  {
    debugger;
     let archivedata=new FormData();
     archivedata.append("id",value);
     return this.http.post(this.serviceurl.host+this.serviceurl.archive,archivedata);
  }
  setunarchive(value)
  {
      debugger;
     let archivedata=new FormData();
     archivedata.append("id",value);
     return this.http.post(this.serviceurl.host+this.serviceurl.unarchive,archivedata);
  }
}
