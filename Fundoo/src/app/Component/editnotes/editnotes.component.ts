import { Component, OnInit,Inject } from '@angular/core';
import {MAT_DIALOG_DATA, MatDialogRef} from "@angular/material"
import { FormBuilder, FormGroup } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { EditService } from 'src/app/services/edit.service';
import { debugOutputAstAsTypeScript } from '@angular/compiler';

@Component({
  selector: 'app-editnotes',
  templateUrl: './editnotes.component.html',
  styleUrls: ['./editnotes.component.css']
})
export class EditnotesComponent implements OnInit {
title:any;
description:any;
dateformat:any;
id:any;
mycolor:any;
editform:FormGroup;
edittitle:any;
editdescription:any;
  constructor( 
    fb:FormBuilder,
    private dialogRef: MatDialogRef<EditnotesComponent>,
    @Inject(MAT_DIALOG_DATA) data:any,private eservice:EditService)
    {
      debugger
      this.title=data.notedata.title;
      this.description=data.notedata.description;
      this.dateformat=data.notedata.dateformat;
      this.id=data.notedata.id;
       this.mycolor=data.notedata.color;
      this.editform=fb.group({
        ftitle:"",
        fdescription:"",
      });
   }
   updatetitle:any;
   updatedescription:any;
  updating(values:any)
  {
    debugger;
    if(values.ftitle ==null || values.ftitle == "")
    {
    values.ftitle  = this.title  ;
    }
   if(values.fdescription==null || values.fdescription == "")
    {
      values.fdescription=this.description;
    }
   let user= this.eservice.update(values,this.id);
   user.subscribe((res:any)=>
   {

   })
  }
  deleteflag=true;
  deleted(values:any)
  {
    this.deleteflag=false;
    debugger;
    let duser=this.eservice.delete(values,this.id);
    duser.subscribe((res:any)=>
    {

    })
  }
  archive(myid)
  {
    debugger;
   let archiveuser=this.eservice.setarchive(myid);
   archiveuser.subscribe((res:any)=>
   {

   });

  }
  color:any;
  colordb(colorvalue:any)
  {
    debugger;
    this.color=colorvalue;
    let coloruser=this.eservice.editcolor(colorvalue,this.id);
    coloruser.subscribe((res:any)=>
    {
        // this.mycolor=res.color;
    })
  }
  ngOnInit() {
  }
}
