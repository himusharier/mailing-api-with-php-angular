import { Component } from '@angular/core';
import {RouterLink} from '@angular/router';
import {CommonModule} from '@angular/common';

@Component({
  selector: 'app-header',
  imports: [RouterLink, CommonModule],
  templateUrl: './header.component.html',
  standalone: true,
  styleUrl: './header.component.css'
})
export class HeaderComponent {
  isUserLoggedIn: boolean = false;
  loggedinUserName: string = "";

  logoutBtn() {
    // this.loggedinUserService.logout();
    window.location.reload();
  }

}
