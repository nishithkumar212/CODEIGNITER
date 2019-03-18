import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './Component/login/login.component';
import { RegisterComponent } from './Component/register/register.component';
import { CustomMaterial } from './material.module';
import { FlexLayoutModule } from "@angular/flex-layout";
import {MatFormFieldModule} from '@angular/material/form-field';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import { HttpClientModule }    from '@angular/common/http';
import {ResetComponent}  from './Component/reset/reset.component';
import {RegisterService} from './services/register.service';
import { ForgotpasswordComponent } from './Component/forgotpassword/forgotpassword.component';
import { DashboardComponent } from './Component/dashboard/dashboard.component';
import {NoteComponent} from './Component/note/note.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    RegisterComponent,
    ForgotpasswordComponent,
    ResetComponent,
    DashboardComponent,
    NoteComponent,

  
  
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    CustomMaterial,
    FlexLayoutModule,
    MatFormFieldModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
  
   
  ],
  providers: [RegisterService],
  bootstrap: [AppComponent]
})
export class AppModule { }
