import { Component } from '@angular/core';
import { MessagingService } from "../app/services/messaging.service";
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
})
export class AppComponent {
  constructor(private msgService: MessagingService) {}
  message;
  ngOnInit() {
    debugger
    this.msgService.getPermission()
    this.msgService.receiveMessage()
    this.message = this.msgService.currentMessage
  }
}

