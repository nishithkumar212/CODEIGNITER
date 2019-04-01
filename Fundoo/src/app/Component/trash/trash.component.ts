import { Component, OnInit } from '@angular/core';
import { ReminderserviceService } from '../../services/reminderservice.service';

@Component({
  selector: 'app-trash',
  templateUrl: './trash.component.html',
  styleUrls: ['./trash.component.css']
})
export class TrashComponent implements OnInit {

  constructor(private reminder:ReminderserviceService) { }
details:any;
  ngOnInit() {
    debugger;
    let archiveuser=this.reminder.selection1();
    archiveuser.subscribe((res:any)=>
    {
        this.details=res as String[];
    })
  }

}
