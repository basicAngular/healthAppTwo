import { Routes, RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';
import { SiteComponent } from './site.component';
import { HomeComponent } from './home/home.component';
import { ContactComponent } from './contact/contact.component';
import { BlogComponent } from './blog/blog.component';

export const routes: Routes = [
    {
        path: '',
        component: SiteComponent,
        children:[
            {   path: 'home',
                component: HomeComponent
            },
            {
                path: 'contact',
                component: ContactComponent
            },
            {
                path: 'blog',
                component: BlogComponent
            }
       ]
    }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})

export class SiteRouting {

}
