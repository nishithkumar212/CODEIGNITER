import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './Component/login/login.component';
import { RegisterComponent } from './Component/register/register.component';
import { ForgotpasswordComponent } from './Component/forgotpassword/forgotpassword.component';
import {ResetComponent} from './Component/reset/reset.component';
const routes: Routes = [
{path : 'login',component : LoginComponent},
{path :'register',component :RegisterComponent},
{path:'forgot',component:ForgotpasswordComponent},
{path : '' ,component :LoginComponent},
{path:'reset',component:ResetComponent},
];

@NgModule({
imports: [RouterModule.forRoot(routes)],
exports: [RouterModule]

})
export class AppRoutingModule { }
