import { Component, OnInit } from '@angular/core';
import { supportsWebAnimations } from '@angular/animations/browser/src/render/web_animations/web_animations_driver';
import { FormGroup, FormBuilder } from '@angular/forms';
import {NoteService} from '../../services/note.service';
import { UseExistingWebDriver } from 'protractor/built/driverProviders';
import decode from 'jwt-decode';
import { variable } from '@angular/compiler/src/output/output_ast';
import { DatePipe } from '@angular/common'
import { HttpHeaders } from '@angular/common/http';
 
@Component({
  selector: 'app-note',
  templateUrl: './note.component.html',
  styleUrls: ['./note.component.css']
})
export class NoteComponent implements OnInit {
  flag:any=true;
  var:any;
  noteform:FormGroup;
  errormsg:string;
  tokenvalue:string;
  myvalue:string;
  emailvalues:string;
  selectiontoken:string;
  data:string[];
  mytitle:string;
  details:string[];
  mydescription:string;
  latest_date:any;
  date:any;
  constructor(private fb:FormBuilder,private service:NoteService,public datepipe: DatePipe) 
  {
    this.noteform=fb.group({
      title:"",
      description:""
    });
  }
  ngOnInit() {
    debugger;
    this.tokenvalue=localStorage.getItem('token');
     this.myvalue=decode(this.tokenvalue);
       this.emailvalues=this.myvalue['email'];
    let user=this.service.selection(this.emailvalues);
    user.subscribe((res:any)=>
    {
        this.details=res as string[];
        debugger;
    })
  }
  initialize()
  {
    this.flag=!this.flag;
  }
  reminder()
  {
    debugger;
    this.date=new Date();
 this.latest_date =this.datepipe.transform(this.date, 'yyyy-MM-dd');
  }
  Forms(value:any)
  {
    debugger;
    console.log(value);
    this.tokenvalue=localStorage.getItem('token');
    //  this.myvalue=decode(this.tokenvalue);
    // this.emailvalues=this.myvalue['email'];
    let user=this.service.register(value,this.tokenvalue,this.latest_date);
      debugger;
     user.subscribe((res:any)=>
      {                
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
