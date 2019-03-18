import { Injectable } from '@angular/core';
import {ServiceUrlService} from '../serviceUrl/service-url.service'
import {HttpClient} from  '@angular/common/http';
import{note} from '../Models/note';
@Injectable({
  providedIn: 'root'
})
export class NoteService {

  constructor(private http:HttpClient,private serverurl:ServiceUrlService,) 
  {
   }
   selection(values)
   {
     debugger;
     let selectuser=new FormData();
     selectuser.append("email",values);
     return this.http.post(this.serverurl.host+this.serverurl.selected,selectuser);
   }
  register(Notes:note,tokenvalue)
  {
    debugger;
    let noteuser=new FormData();
    noteuser.append("title",Notes.title);
    noteuser.append("description",Notes.description);
    noteuser.append("emailid",tokenvalue);
    return this.http.post(this.serverurl.host+this.serverurl.note,noteuser);
  
  }
}
