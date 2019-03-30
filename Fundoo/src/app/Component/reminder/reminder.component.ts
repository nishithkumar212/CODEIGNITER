import { Component, OnInit } from '@angular/core';
import { ReminderserviceService } from '../../services/reminderservice.service';

@Component({
  selector: 'app-reminder',
  templateUrl: './reminder.component.html',
  styleUrls: ['./reminder.component.css']
})
export class ReminderComponent implements OnInit {

  constructor(private reminder:ReminderserviceService) { }

  ngOnInit() {

    this.reminder.selection();
  }

}
