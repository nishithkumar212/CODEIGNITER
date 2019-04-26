import { Injectable } from '@angular/core';
import {Observable} from "rxjs";
import {Subject} from "rxjs";
@Injectable({
  providedIn: 'root'
})
export class ViewService {
   result:boolean=true;
   subject= new Subject();
  constructor() { }

  getview()
 {
  this.gridview();
    return this.subject.asObservable();
  }
   gridview()
  {
    if(this.result)
    {
    this.subject.next({data:"row"});
    this.result=false;
    }
    else
    {
      this.subject.next({data:"column"});
      this.result=true;
    }
  }
}
