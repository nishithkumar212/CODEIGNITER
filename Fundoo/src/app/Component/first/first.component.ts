import { Component, OnInit,Input } from '@angular/core';

@Component({
  selector: 'app-first',
  templateUrl: './first.component.html',
  styleUrls: ['./first.component.css']
})
export class FirstComponent implements OnInit {
 users:any;
  constructor() { 
    this.users=
  [
    {"id":101,
    "name":"nishith",
    "stream":"it",
    "proprer":"warangal"},
    {"id":102,
    "name":"pramod",
    "stream":"marketing",
    "proprer":"warangal"},
    {"id":103,
    "name":"chinna",
    "stream":"politics",
    "proprer":"warangal"},
    {"id":104,
    "name":"kanna",
    "stream":"strategy",
    "proprer":"warangal"},
  ]
  }
  ngOnInit() {
  }
  handleclick() {
    console.log('hey I am  clicked in child');
}
}
