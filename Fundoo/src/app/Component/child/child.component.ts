import { Component, OnInit,Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-child',
  templateUrl: './child.component.html',
  styleUrls: ['./child.component.css']
})
export class ChildComponent implements OnInit {

  constructor() { }
@Output()
event=new EventEmitter();
 message=[
  {"id":101,"name":"ache","place":"warangal"}
 ]
method()
{
  debugger;
  this.event.emit(this.message);
}
  ngOnInit() {
  }

}
