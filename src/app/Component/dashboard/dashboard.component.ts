import { Component, OnInit } from '@angular/core';
import * as $ from "jquery";
import decode from 'jwt-decode';
import { ViewService } from 'src/app/services/view.service';
import {MatDialog, MatDialogConfig} from "@angular/material";
import { LabelComponent } from '../label/label.component';
import { NoteService } from '../../services/note.service';
import { CookieService} from 'ngx-cookie-service';
import {Router} from '@angular/router';
import { SearchService } from 'src/app/services/search.service';
import { LoginService } from 'src/app/services/login.service';
import { note } from 'src/app/Models/note';
import {labels} from 'src/app/Models/labels';
import { element } from 'protractor';
@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css'],
})
export class DashboardComponent implements OnInit {
  sendedlabel=" nishithkumar";
  showFiller = false;
  list: any = true;
  grid: any = false;
  dialogConfig;
  notes:note[];
  details;
  sendinglabel:any;
  detailslabels:labels[];
  updatedimage;
  googleimages;
  constructor(private view: ViewService,private dialog: MatDialog,private route:Router,private service: NoteService,private cookies:CookieService,private search:SearchService,private  serve:LoginService) { 
  this.googleimages=this.cookies.get("image");
  }
  "angularCompilerOptions": {
    "preserveWhitespaces": true
  }
  email: string;
  myimages:any;
  selectionuser:any;
  notesdetails:any;
  myemail:any;
  ngOnInit() {
    debugger;
    //this.googleimages=this.cookies.get("image");
    const token = localStorage.getItem('token');
    var decoded = decode(token);
    this.email = decoded.id;
    this.selectionuser=this.service.imageselection(this.email); 
     this.selectionuser.subscribe((res:any)=>
     {
       debugger;
      this.notes = res;
      this.notes.forEach(element => {
        this.updatedimage ="data:image/jpeg;base64,"+element.image ,
        this.myemail=element.emailid;
      });
       console.log(res+"aaaa");
     });
     debugger;
     let createlabel=this.service.selection1(this.email);
    createlabel.subscribe((res:any)=>
    {
      this.details=res ;
      this.detailslabels=res;
      this.detailslabels.forEach(element =>{
        this.sendinglabel=element.labelname;
      }
        );
    });
  }
  
  clicker() {
    if (this.list == true) {
      this.list = false;
      this.grid = true;
    }
    else {
      this.grid = false;
      this.list = true;
    }
    this.view.gridview();
  }
  remove()
  {
    localStorage.removeItem("token");
    this.route.navigate(["/login"]);
  }
  opendialog()
  {
    debugger;
    this. dialogConfig = new MatDialogConfig();
    this.dialogConfig.disableClose = false;
   this.dialogConfig.autoFocus = true;
   this.dialogConfig.width='400px';
   this.dialogConfig.height='400px';
   this.dialogConfig.align='center';
   this.dialogConfig.direction='ltr';
  
   this.dialogConfig.data=this.email;
this.dialogConfig.data={
  
    email:this.email,
    labelname:[this.details]
  
};
   
   this.dialog.open(LabelComponent,this.dialogConfig);
  }

  sendlabel(labelvalue:any)
  {
    debugger;
    this.service.sendlabel(labelvalue)
  }
  signout() {
    localStorage.removeItem('token');
  }
  searchtext:String;
  searching()
  {
    console.log(this.searchtext);
    
    debugger;
    if(this.searchtext != undefined)
    {    this.search.searchingdata(this.searchtext);


    }
  }
google=true;
changefile($event)
{
  this.google=false;
  debugger;
 var  files= $event.target.files;
 var file=files[0];
 if(file&&files)
 {
    var reader=new FileReader();
   reader.onload =this._handleReaderLoaded.bind(this);
   reader.readAsBinaryString(file);
 }
}
base64string;
_handleReaderLoaded(readerEvt)
{
  debugger;
 var binarystring =readerEvt.target.result;
this.base64string=btoa(binarystring);
console.log(this.base64string);
 let imageuser=this.serve.imageinsertion(this.email,this.base64string);
 imageuser.subscribe((res:any)=>
 {

 });
 
// users.subscribe((res:any)=>
// {
 
// });

}
}
