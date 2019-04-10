import { Component, OnInit } from '@angular/core';
import { ReminderserviceService } from '../../services/reminderservice.service';
import { EditService } from 'src/app/services/edit.service';
import decode from 'jwt-decode';
@Component({
  selector: 'app-trash',
  templateUrl: './trash.component.html',
  styleUrls: ['./trash.component.css']
})
export class TrashComponent implements OnInit {

  constructor(private reminder:ReminderserviceService,private eservice:EditService) { }
details:any;
email:any;
decodedemail:any;
  ngOnInit() {
    debugger;
    this.email=localStorage.getItem("token");
    this.decodedemail=decode(this.email);
    let archiveuser=this.reminder.selection1(this.decodedemail);
  
    archiveuser.subscribe((res:any)=>
    {
        this.details=res as String[];
    })
  }
  unarchive(myid)
  {
    debugger;
   let archiveuser=this.eservice.setunarchive(myid);
   archiveuser.subscribe((res:any)=>
   {

   });
  }
}
