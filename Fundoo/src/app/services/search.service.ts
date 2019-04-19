import { Injectable } from '@angular/core';
import { Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class SearchService {
   subject=new  Subject();
   var;
  constructor() { }
  searchingdata(datas:any)
  { 
    this.var = datas;
    this.subject.next({data:datas});
  }
  searchingreturn()
  {
    this.searchingdata(this.var);
    return this.subject.asObservable();
  }
}
