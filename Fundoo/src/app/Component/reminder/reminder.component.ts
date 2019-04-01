import { Component, OnInit } from '@angular/core';
import { ReminderserviceService } from '../../services/reminderservice.service';

@Component({
  selector: 'app-reminder',
  templateUrl: './reminder.component.html',
  styleUrls: ['./reminder.component.css']
})
export class ReminderComponent implements OnInit {
details:String[];
  constructor(private reminder:ReminderserviceService) { }

  ngOnInit() {
          debugger;
     let reminderuser=this.reminder.selection();
     reminderuser.subscribe((res:any)=>
     {
         this.details=res as String[];
     })

  }

}
