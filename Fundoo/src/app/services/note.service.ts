import { Injectable } from '@angular/core';
import {ServiceUrlService} from '../serviceUrl/service-url.service'
import {HttpClient} from  '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class NoteService {

  constructor(private http:HttpClient,private server:ServiceUrlService) 
  {

   }
  register(value)
  {
    this.http.ser
  }
}
