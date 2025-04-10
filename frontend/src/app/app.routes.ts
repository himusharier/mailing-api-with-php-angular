import { Routes } from '@angular/router';
import {HomepageComponent} from './homepage/homepage.component';
import {ErrorpageComponent} from './errorpage/errorpage.component';
import {DocumentationComponent} from './documentation/documentation.component';
import {LoginComponent} from './login/login.component';
import {RegisterComponent} from './register/register.component';
import {ProfileComponent} from './profile/profile.component';
import {RecoveryComponent} from './login/recovery/recovery.component';
import {ResetComponent} from './login/reset/reset.component';

export const routes: Routes = [
  {path: '', pathMatch: 'full', component: HomepageComponent},
  {path: 'home', pathMatch: 'full', component: HomepageComponent},
  {path: 'documentation', pathMatch: 'full', component: DocumentationComponent},
  {path: 'login', pathMatch: 'full', component: LoginComponent},
  {path: 'register', pathMatch: 'full', component: RegisterComponent},
  {path: 'recovery', pathMatch: 'full', component: RecoveryComponent},
  {path: 'reset', pathMatch: 'full', component: ResetComponent},
  {path: 'profile', pathMatch: 'full', component: ProfileComponent},
  {path: '**', component: ErrorpageComponent}
];
