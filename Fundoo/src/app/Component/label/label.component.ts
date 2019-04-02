import { Component, OnInit ,Inject} from '@angular/core';
import {MAT_DIALOG_DATA, MatDialogRef} from "@angular/material"
import { NoteService } from '../../services/note.service';
import { FormGroup, FormBuilder } from '@angular/forms';
import decode from 'jwt-decode';
@Component({
  selector: 'app-label',
  templateUrl: './label.component.html',
  styleUrls: ['./label.component.css']
})
export class LabelComponent implements OnInit {
email;
labelemail:any;
labelform:FormGroup;
myvalue:any;
emailvalues:any;
  constructor(private fb:FormBuilder,private dialogRef: MatDialogRef<LabelComponent>, @Inject(MAT_DIALOG_DATA) data:any,private service: NoteService) 
  {
      this.labelform=fb.group(
        {
               createlabel:""
        }
      );
   this.email=data;
   }
   details:String[];
  ngOnInit() {
    // this.labelemail==localStorage.getItem('token');
    // this.myvalue = decode(this.labelemail);
    // this.emailvalues = this.myvalue['email'];
    // let createlabel=this.service.selection1(this.emailvalues);
    // createlabel.subscribe((res:any)=>
    // {
    //   this.details=res as String[];
    // })
  }
  addlabel(values:any)
{

  debugger;
  let labeluser=this.service.createlabel(values,this.email);
  labeluser.subscribe((res:any)=>
  {

  })
}
}
