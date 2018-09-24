import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { HomeComponent } from './home/home.component';
import { BlogComponent } from './blog/blog.component';
import { BlogDetailsComponent } from './blog-details/blog-details.component';
import { ContactComponent } from './contact/contact.component';

import { SiteComponent } from './site.component';
import {SiteRouting} from './site.routing';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    NgbModule.forRoot(),
    SiteRouting
  ],
  declarations: [
  HomeComponent,
  BlogComponent,
  BlogDetailsComponent,
  ContactComponent,
  SiteComponent
  ],
  providers:[

  ]
})
export class SiteModule { }
