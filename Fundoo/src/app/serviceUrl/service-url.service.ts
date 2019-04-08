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
  public notes="notes";
  public selected="selected";
  public selectedlabel="selectedlabel";
  public noteedit="noteedit";
  public deletenote="deletenote";
  public setcolor="setcolor";
  public reminder="reminder";
  public archive="archive";
  public unarchive="unarchive";
  public archivedisplay="archivedisplay";
  public createlabel="createlabel";
  public getlabel="getlabel";
  public selectiondelete="selectiondelete";
  public sociallogindata="sociallogindata";
}
