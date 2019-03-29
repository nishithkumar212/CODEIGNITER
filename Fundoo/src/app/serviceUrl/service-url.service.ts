import { Injectable } from '@angular/core';
import {environment} from '../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ServiceUrlService {

  constructor() { }

  public host = environment.baseUrl;
  public register = "register";
  public login = "login";
  public forgot="forgot";
  public reset="reset";
  public getemail="fetchemails";
  public note="note";
  public selected="selected";
  public noteedit="noteedit";
  public deletenote="deletenote";
  public setcolor="setcolor";
}
