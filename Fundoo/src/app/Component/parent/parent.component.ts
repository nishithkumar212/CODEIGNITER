import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-parent',
  templateUrl: './parent.component.html',
  template:`<app-child (valueChange)='displayCounter($event)'></app-child>`,
  styleUrls: ['./parent.component.css']
})
export class ParentComponent implements OnInit {
message;
  constructor() { }
dispalycounter(value)
{
  debugger;
console.log(value);
  this.message=value;
}
  ngOnInit() {
  }

}
