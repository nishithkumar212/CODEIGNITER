import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-parent',
  templateUrl: './parent.component.html',
  styleUrls: ['./parent.component.css']
})
export class ParentComponent implements OnInit {

  constructor() { }
dispalycounter(value)
{
  debugger;
console.log(value);
}
  ngOnInit() {
  }
  appParentMessage = "This message is from parent"
}
