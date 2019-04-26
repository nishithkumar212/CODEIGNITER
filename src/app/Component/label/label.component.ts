import { Component, OnInit ,Inject} from '@angular/core';
import {MAT_DIALOG_DATA, MatDialogRef} from "@angular/material"
import { NoteService } from '../../services/note.service';
import { FormGroup, FormBuilder, FormControl } from '@angular/forms';
import decode from 'jwt-decode';

@Component({
  selector: 'app-label',
  templateUrl: './label.component.html',
  styleUrls: ['./label.component.css']
})
export class LabelComponent implements OnInit {
email;
uid;
labelemail:any;
labelform:FormGroup;
myvalue:any;
emailvalues:any;
labelnames
renamelabel
  constructor(private fb:FormBuilder,private dialogRef: MatDialogRef<LabelComponent>, @Inject(MAT_DIALOG_DATA) data:any,private service: NoteService) 
  {
    this.renamelabel=new FormControl();
      this.labelform=fb.group(
        {
               createlabel:"",

        }
      );
   this.uid=data.email;
   }
   details:String[];
  ngOnInit() {
    let createlabel=this.service.selection1(this.uid);
    createlabel.subscribe((res:any)=>
    {
      this.details=res as String[];
    })
  }
  modeedit:any;
  ln:any;
 
modeedits(labelid)
{
  debugger;
 this.ln= this.renamelabel.value;
this.service.renamelabel(this.renamelabel,labelid);
}
  addlabel(values:any)
{
  debugger;
  let labeluser=this.service.createlabel(values,this.uid);
  labeluser.subscribe((res:any)=>
  {

  })
}
}
