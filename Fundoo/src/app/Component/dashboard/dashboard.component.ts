import { Component, OnInit } from '@angular/core';
import * as $ from "jquery";
import decode from 'jwt-decode';
import { ViewService } from 'src/app/services/view.service';
@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
  showFiller = false;
  list: any = true;
  grid:any=false;
  constructor(private view: ViewService) { }

  "angularCompilerOptions": {
    "preserveWhitespaces": true
  }
  email: string;
  ngOnInit() {
    const token = localStorage.getItem('token');
    var decoded = decode(token);
    this.email = decoded.email;
  }
  clicker() {
    if (this.list==true)
    { 
      this.list = false;
      this.grid=true;
    }
    else
    {
      this.grid=false;
      this.list= true;
    }
    this.view.gridview();
  }
  signout() {
    localStorage.removeItem('token');
  }
}
