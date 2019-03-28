import { Component, OnInit } from '@angular/core';
import { supportsWebAnimations } from '@angular/animations/browser/src/render/web_animations/web_animations_driver';
import { FormGroup, FormBuilder } from '@angular/forms';
import { NoteService } from '../../services/note.service';
import { UseExistingWebDriver } from 'protractor/built/driverProviders';
import decode from 'jwt-decode';
import { variable, THIS_EXPR } from '@angular/compiler/src/output/output_ast';
import { DatePipe } from '@angular/common'
import { HttpHeaders } from '@angular/common/http';
import { ViewService } from 'src/app/services/view.service';
import * as moment from 'moment';
import {MatDialog, MatDialogConfig} from "@angular/material";
import { EditnotesComponent } from '../editnotes/editnotes.component';
@Component({
  selector: 'app-note',
  templateUrl: './note.component.html',
  styleUrls: ['./note.component.css']
})
export class NoteComponent implements OnInit {
  flag: any = true;
  var: any;
  noteform: FormGroup;
  errormsg: string;
  tokenvalue: string;
  myvalue: string;
  emailvalues: string;
  selectiontoken: string;
  data: string[];
  mytitle: string;
  details: string[];
  mydescription: string;
  latest_date: any;
  date: any;
  dateuser: FormGroup;
  d: any;

  breakpoint: any;
  wrap: string = "wrap";
  direction: string;
  layout: any;
  // layout: string = this.direction + " " + this.wrap
 view;
//  cards:boolean=true;


  constructor(private fb: FormBuilder, private service: NoteService, public datepipe: DatePipe, private vi: ViewService,private dialog: MatDialog) {
    this.noteform = fb.group({
      title: "",
      description: ""
    });
    this.dateuser = fb.group(
      {
        datevalue: ""
      }
    );
    this.direction="row";
  }

  ngOnInit() {
    // this.breakpoint = (window.innerWidth <= 400) ? 1 : 6;
    debugger;
    this.tokenvalue = localStorage.getItem('token');
    this.myvalue = decode(this.tokenvalue);
    this.emailvalues = this.myvalue['email'];
    let user = this.service.selection(this.emailvalues);
    // setInterval(() => {
     
    // }, 1000);
     user.subscribe((res: any) => {
        this.details = res as string[];
      })
    this.vi.getview().subscribe(res => {
      this.view = res;
      this.direction = this.view.data;
    })
  }
  // onResize(event) {
  //   // this.breakpoint = (event.target.innerWidth <= 400) ? 1 : 6;
  // }
  initialize() {
    this.flag = !this.flag;
  }
  // reminder() {
  //   debugger;
  //   this.date = new Date();
  //   // this.latest_date = this.datepipe.transform(this.date, 'yyyy-MM-dd');
  // }
  cardcal
datecalender;
dialogConfig;
  mydate(value: any) {
    // this.cards=false;
    debugger;
    this.latest_date=moment(this.date).format('DD-MMM');
    // this.cardcal =false;
    this.datecalender=false;
  }

  title:any;
  description:any;
  dateformat:any;
  mydata:any;
  openDialog(notes:any) {
    debugger;
   this. dialogConfig = new MatDialogConfig();
this.dialogConfig.data={
    notedata:notes,
};
   this.dialogConfig.disableClose = false;
   this.dialogConfig.autoFocus = true;
   this.dialogConfig.width='600px';
   this.dialogConfig.height='200px';
   this.dialogConfig.align='center';
   this.dialogConfig.direction='ltr';
   this.dialog.open(EditnotesComponent,this.dialogConfig);
  }
  noteshow;
  Forms(value: any) {
    debugger;
    console.log(value);
    this.flag =true;
    this.tokenvalue = localStorage.getItem('token');
    //  this.myvalue=decode(this.tokenvalue);
    // this.emailvalues=this.myvalue['email'];
    let user = this.service.register(value, this.tokenvalue, this.latest_date);
    debugger;
    user.subscribe((res: any) => {
      //   if(res.message=="200")
      //   {
      //     this.errormsg="note inserted successsfully in database";
      //   }
      //   else if(res.message=="204")
      //   {
      //     this.errormsg="some thing went wrong in insertion ";
      //   }
    })
  }
}





