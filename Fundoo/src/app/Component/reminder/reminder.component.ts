import { Component, OnInit } from '@angular/core';
import { ReminderserviceService } from '../../services/reminderservice.service';
import { EditService } from 'src/app/services/edit.service';
import { NoteService } from 'src/app/services/note.service';
import { FormGroup, FormBuilder } from '@angular/forms';
@Component({
  selector: 'app-reminder',
  templateUrl: './reminder.component.html',
  styleUrls: ['./reminder.component.css']
})
export class ReminderComponent implements OnInit {
details:String[];
noteform: FormGroup;
  constructor(private fb: FormBuilder,private reminder:ReminderserviceService,private  eservice:EditService,private service: NoteService) 
  {
    this.noteform = fb.group({
      title: "",
      description: ""
    });
   }

  ngOnInit() {
          debugger;
     let reminderuser=this.reminder.selection();
     reminderuser.subscribe((res:any)=>
     {
         this.details=res as String[];
     })

  }
  deleteflag=true;
  deleted(values:any)
  {
    this.deleteflag=false;
    debugger;
    let duser=this.eservice.delete(values,values);
    duser.subscribe((res:any)=>
    {

    })
  }


  colordb(value,uid)
  {
    debugger;
    let coloruser=this.service.coloring(value,uid);
    coloruser.subscribe((res:any)=>
    {
      
    })
  }
}
