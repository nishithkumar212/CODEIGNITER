import { Injectable } from '@angular/core';
import {ServiceUrlService} from '../serviceUrl/service-url.service'
import {HttpClient,HttpHeaders} from  '@angular/common/http';
import{note} from '../Models/note';
@Injectable({
  providedIn: 'root'
})
export class NoteService {
head:any;
headers:any;
new :any;
  constructor(private http:HttpClient,private serverurl:ServiceUrlService) 
  {
   }
   selection(values)
   {
     debugger;
     let selectuser=new FormData();
     selectuser.append("tokenemail",values);
     return this.http.post(this.serverurl.host+this.serverurl.selected,selectuser);
   }
  register(Notes:note,tokenvalue,date)
  {
    debugger;
    let noteuser=new FormData();
    noteuser.append("title",Notes.title);
    noteuser.append("description",Notes.description);
     //noteuser.append("emailid",tokenvalue);
    this.head=new HttpHeaders().set("Authorization",tokenvalue);
    console.log(this.head);
    noteuser.append("reminder",date);
    //this.new=this.head.get("AUthorization");
    return this.http.post(this.serverurl.host+this.serverurl.note,noteuser,{
      headers:this.head
    });
  }
  coloring(value,id)
  {
    debugger;
    let coloruser=new FormData();
    coloruser.append("setcolor",value);
    coloruser.append("setid",id);
return this.http.post(this.serverurl.host+this.serverurl.setcolor,coloruser);
  }
  createlabel(values,email)
  {
    debugger;
    let labeluser=new FormData();
    labeluser.append("label",values.createlabel);
    labeluser.append("email",email);
    return this.http.post(this.serverurl.host+this.serverurl.createlabel,labeluser);
  }


selection1(value)
{
  debugger;
  let selectlabeluser=new FormData();
  selectlabeluser.append("email",value);
  return this.http.post(this.serverurl.host+this.serverurl.getlabel,selectlabeluser);
}
}
