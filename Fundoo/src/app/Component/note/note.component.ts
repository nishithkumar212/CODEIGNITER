import { Component, OnInit } from '@angular/core';
import { supportsWebAnimations } from '@angular/animations/browser/src/render/web_animations/web_animations_driver';
import { FormGroup, FormBuilder } from '@angular/forms';
import { NoteService } from '../../services/note.service';
import {  EventEmitter, Output } from '@angular/core';
import { UseExistingWebDriver } from 'protractor/built/driverProviders';
import decode from 'jwt-decode';
import { variable, THIS_EXPR } from '@angular/compiler/src/output/output_ast';
import { DatePipe } from '@angular/common'
import { HttpHeaders } from '@angular/common/http';
import { ViewService } from 'src/app/services/view.service';
import * as moment from 'moment';
// import {note } from "../../Models/note";
import {MatDialog, MatDialogConfig} from "@angular/material";
import { EditnotesComponent } from '../editnotes/editnotes.component';
import {ReminderserviceService} from '../../services/reminderservice.service';
import { EditService } from 'src/app/services/edit.service';
// import {MatSnackBar} from '@angular/material';
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
  labeldetails:string[];
  mydescription: string;
  latest_date: any;
  date: any;
  dateuser: FormGroup;
  d: any;
valuechange:any;
  breakpoint: any;
  wrap: string = "wrap";
  direction: string;
  layout: any;
  remins=false;
  // layout: string = this.direction + " " + this.wrap
 view;
//  cards:boolean=true;


  constructor(private fb: FormBuilder,private myremind:ReminderserviceService,private service: NoteService, public datepipe: DatePipe, private vi: ViewService,private dialog: MatDialog,private  eservice:EditService) {
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
    console.log(user);
    user.subscribe((res: any) => {
      this.details = res as string[];
    });
    let selectionlabel=this.service.selectionlabel(this.emailvalues);
    selectionlabel.subscribe((res:any)=>
    {
  
      this.labeldetails = res as string[];
      console.log(this.labeldetails);
    });

    setInterval(() => {
    
      // this.reminderalert()
    }, 1000);

    this.vi.getview().subscribe(res => {
      this.view = res;
      debugger;
      console.log(this.view)
      this.direction = this.view.data;
    })
  }
  // onResize(event) {
  //   // this.breakpoint = (event.target.innerWidth <= 400) ? 1 : 6;
  // }
  // reminderalert()
  // {
  //   let day=new Date();
  //   this.fulldate=day.toDateString()+""+(day.getHours()%12)+ ":"+day.getMinutes();
  //   this.fulldate = moment(this.fulldate).format("DD/MM/YYYY hh:mm") + " pm";
  //   this.details.forEach(element => {
	// 		/**
	// 		 * compare with present time if equal alert remainder
	// 		 */
	// 		if (this.fulldate == this.currentDateAndTime) {
	// 			this.snackBar.open("alertmessage", "", {
	// 				duration: 2000
	// 			});
	// 		}
	// 	});
  // }
  initialize() {
    this.flag = !this.flag;
  }

  currentDateAndTime:any;
  currentdate:any;
  timer:any;
  fulldate:any;
  // today() {
  //   var date = new Date();
  //   this.date = date.toDateString();
  //   this.currentdate = moment(this.date).format('DD/MM/YY');
  //   this.currentDateAndTime = this.currentdate + " " + "8:00";
  //   this.timer = true;
  //   }
    
  //   tomorrow() {
  //   var date = new Date();
  //   date.setDate(date.getDate() + 1);
  //   this.date = date.toDateString();
  //   this.currentdate = moment(this.date).format('DD/MM/YY');
  //   this.currentDateAndTime = this.currentdate + " " + "8:00";
  //   this.timer = true;
  //   }
  //     nextWeek() {
  //       debugger;
  //       var day = new Date();
  //       this.fulldate = day.setDate(day.getDate() + ((1 + 7 - day.getDay()) % 7));
  //       let currentDate = moment(this.fulldate).format("DD/MM/YYYY");
  //       this.currentDateAndTime = currentDate + " " + " 08:00 PM";
  //   this.timer = true;
  //   }
  reminder1date:any;
  reminder(value) {
    if(value==1)
    {
      debugger;
      this.remins=true;
      var date = new Date();
      this.date = date.toDateString();
      this.currentdate = moment(this.date).format('DD/MM/YY');
      this.currentDateAndTime = this.currentdate + " " + "8:00 PM";
      this.timer = true;
  }
  else if(value==2)
  {
    debugger;
    this.remins=true;
    var date = new Date();
    date.setDate(date.getDate() + 1);
    this.date = date.toDateString();
    this.currentdate = moment(this.date).format('DD/MM/YY');
    this.currentDateAndTime = this.currentdate + " " + "8:00 AM";
    this.timer = true;
  }
  else if(value==3)
  {
    this.remins=true;
    debugger;
    var day = new Date();
    this.fulldate = day.setDate(day.getDate() + ((1 + 7 - day.getDay()) % 7));
    let currentDate = moment(this.fulldate).format("DD/MM/YYYY");
    this.currentDateAndTime = currentDate + " " + " 08:00 PM"; 

this.timer = true;
  }
}
  cardcal
 datecalender:any;;
dialogConfig;
notecalender;

  mydate(value: any) {
    // this.cards=false;
    this.remins=true;
    debugger;
    this.currentDateAndTime=moment(this.date).format("DD/MM/YYYY");
    this.service.register(value, this.tokenvalue,  this.currentDateAndTime);
    // this.latest_date=moment(this.date).format('DD-MMM');
    // // this.cardcal =false;
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
  colordb(value,uid)
  {
    debugger;
    let coloruser=this.service.coloring(value,uid);
    coloruser.subscribe((res:any)=>
    {
      
    })
  }
  noteshow;
  selectedFile;
  base64textString
  Mainimage
  handleFileSelect(event) {

    var files = event.target.files;
    var file = files[0];
  if (files && file) {
      var reader = new FileReader();
      reader.onload =this._handleReaderLoaded.bind(this);
      reader.readAsBinaryString(file);
  }
}
_handleReaderLoaded(readerEvt) {
  debugger;
 var binaryString = readerEvt.target.result;
        this.base64textString= btoa(binaryString);
        this.Mainimage = "data:image/jpeg;base64," + this.base64textString;
}
  Forms(value: any) {
    debugger;
    console.log(value);
    this.flag =true;
    this.tokenvalue = localStorage.getItem('token');
    //  this.myvalue=decode(this.tokenvalue);
    // this.emailvalues=this.myvalue['email'];
    let user = this.service.register(value, this.tokenvalue,  this.currentDateAndTime);
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
  addinglabel(value,id)
  {

  }
  archive(myid)
  {
    debugger;
   let archiveuser=this.eservice.setarchive(myid);
   archiveuser.subscribe((res:any)=>
   {

   });



  }

  deleteflag=true;
// token:any;
// tokenemail:any;
  deleted(values:any)
  {
    // this.token=localStorage.getItem("token");
    // this.tokenemail=decode(this.token);
    // this.deleteflag=false;
    // debugger;
    let duser=this.eservice.delete(values,values);
    duser.subscribe((res:any)=>
    {

    })
  }







  @Output() valueChange = new EventEmitter();
 valuechanged()
 {
  this.valuechange.emit(this.details);
 }
}





