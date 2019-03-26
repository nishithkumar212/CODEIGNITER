import { Injectable } from '@angular/core';
import {Observable} from "rxjs";
import {Subject} from "rxjs";
@Injectable({
  providedIn: 'root'
})
export class ViewService {
  private result:boolean=true;
  private subject= new Subject();
  constructor() { }

  getview()
{
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
