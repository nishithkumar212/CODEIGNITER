import { Injectable } from '@angular/core';
import {ServiceUrlService} from '../serviceUrl/service-url.service'
import {HttpClient,HttpHeaders} from  '@angular/common/http';
import{note} from '../Models/note';
import { Subject } from 'rxjs';
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
   selectionlabel(values)
   {
      debugger;
      let selectionlabel=new FormData();
      selectionlabel.append("tokenemail",values);
      return this.http.post(this.serverurl.host+this.serverurl.selectedlabel,selectionlabel);
   }
   subject1=new Subject();
   sendlabel(value)
   {
     debugger;
     this.subject1.next({data:value});
   }
   viewlabel()
   {
     return this.subject1.asObservable();
   }
  register(Notes:note,labelid,tokenvalue,date)
  {
    debugger;
    let noteuser=new FormData();
    noteuser.append("title",Notes.title);
    noteuser.append("description",Notes.description);
    noteuser.append("labelid",labelid);
     //noteuser.append("emailid",tokenvalue);
    // this.head=new HttpHeaders().set("Authorization",tokenvalue);
    // console.log(this.head);
    noteuser.append("reminder",date);
    //this.new=this.head.get("AUthorization");
    return this.http.post(this.serverurl.host+this.serverurl.note,noteuser,{
      headers:this.head
    });
  }
  register1(value,labelid,uid)
  {
    debugger;
    let labeledituser=new FormData();
    labeledituser.append("title",value.title);
    labeledituser.append("description",value.description);
    labeledituser.append("labelname",value.labelname);
    labeledituser.append("labelid",labelid);
    labeledituser.append("uid",uid);
    return this.http.post(this.serverurl.host+this.serverurl.notes,labeledituser);
  }
  coloring(value,id)
  {
    debugger;
    let coloruser=new FormData();
    coloruser.append("setcolor",value);
    coloruser.append("setid",id);
return this.http.post(this.serverurl.host+this.serverurl.setcolor,coloruser);
  }
  createlabel(values,uid)
  {
  debugger;
    let labeluser=new FormData();
    labeluser.append("label",values.createlabel);
    labeluser.append("uid",uid);
    return this.http.post(this.serverurl.host+this.serverurl.createlabel,labeluser);
  }


selection1(value)
{
debugger;
  let selectlabeluser=new FormData();
  selectlabeluser.append("tokenemail",value);
  return this.http.post(this.serverurl.host+this.serverurl.getlabel,selectlabeluser);
}
imageinsertion(email,image)
{
  
  let imageuser=new FormData();
  imageuser.append("email",email);
  imageuser.append("image",image);
  return this.http.post(this.serverurl.host+this.serverurl.imageinsertion,imageuser);
}
imageinsertionnote(image,id)
{
  debugger;
  let imageinsertionnote=new FormData();
  imageinsertionnote.append("image",image);
  imageinsertionnote.append("id",id);
  return this.http.post(this.serverurl.host+this.serverurl.imageinsertionnote,imageinsertionnote)
}

 imageselection(uid)
 {
   debugger;
  let selectuser=new FormData();
  selectuser.append("uid",uid);
  return this.http.post(this.serverurl.host+this.serverurl.imageselection,selectuser);
 }

 selectioncreatelabel()
 {

 }

  childlabel(labelid)
  {
    debugger;
    let childlabel=new FormData();
    childlabel.append("labelid",labelid);
    return this.http.post(this.serverurl.host+this.serverurl.childlabel,childlabel);
  }
  updatinglabelnotes(labelid,notesid)
  {
    debugger;
      let updatinglabelnotes=new FormData();
      updatinglabelnotes.append("labelid",labelid);
      updatinglabelnotes.append("notesid",notesid);
      return this.http.post(this.serverurl.host+this.serverurl.updatelabelnotes,updatinglabelnotes);      
  }
  labeldelete(labelid,noteid)
  {
    debugger;
    let deletelabelnotes=new FormData();
    deletelabelnotes.append("labelid",labelid);
    deletelabelnotes.append("noteid",noteid);
    return this.http.post(this.serverurl.host+this.serverurl.deletelabel,deletelabelnotes);
  }
  addinglabel(labelid,noteid)
  {
    debugger;
    let addinglabel=new FormData();
    addinglabel.append("labelid",labelid);
    addinglabel.append("noteid",noteid);
    return this.http.post(this.serverurl.host+this.serverurl.addlabel,addinglabel);
  }
  renamelabel(labelname,labelid)
  {
      let labels=new FormData();
      labels.append("labelname",labelname);
      labels.append("labelid",labelid);
      return this.http.post(this.serverurl.host+this.serverurl.renamelabel,labels);
  }

  deleteredis()
  {
    return this.http.get(this.serverurl.host+this.serverurl.deleteredis)
  }
  dragAndDrop(difference,dragid,direction,uid)
  {
    debugger;
    let dragdrop=new FormData();
    dragdrop.append("difference",difference);
    dragdrop.append("dragid",dragid);
    dragdrop.append("direction",direction);
    dragdrop.append("uid",uid);
    return this.http.post(this.serverurl.host+this.serverurl.dragging,dragdrop);
    
  }
}

