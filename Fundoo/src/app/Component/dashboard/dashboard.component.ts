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
@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
  showFiller = false;
  list: any = true;
  grid: any = false;
  dialogConfig;
  details;
  googleimages;
  constructor(private view: ViewService,private dialog: MatDialog,private route:Router,private service: NoteService,private cookies:CookieService,private search:SearchService) { 
  this.googleimages=this.cookies.get("image");
  }

  "angularCompilerOptions": {
    "preserveWhitespaces": true
  }
  email: string;
  myimages:any;
  ngOnInit() {
    debugger;
    //this.googleimages=this.cookies.get("image");
    const token = localStorage.getItem('token');
    var decoded = decode(token);
    this.email = decoded.email;
    
    let createlabel=this.service.selection1(this.email);
    createlabel.subscribe((res:any)=>
    {
      this.details=res as String[];
    })
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
    this. dialogConfig = new MatDialogConfig();
    this.dialogConfig.disableClose = false;
   this.dialogConfig.autoFocus = true;
   this.dialogConfig.width='400px';
   this.dialogConfig.height='200px';
   this.dialogConfig.align='center';
   this.dialogConfig.direction='ltr';
   this.dialogConfig.data=this.email;
   this.dialog.open(LabelComponent,this.dialogConfig);
  }
  signout() {
    localStorage.removeItem('token');
  }
  searchtext:String;
  searching()
  {
    console.log(this.searchtext);
    
    debugger;
    this.search.searchingdata(this.searchtext);
  }





  //googleimages=this.cookies.get("image");
}
