import { Routes, RouterModule } from '@angular/router';
import { ModuleWithProviders } from '@angular/core';

import { PagesComponent } from './pages.component';
import { BlankComponent } from './blank/blank.component';
import { SearchComponent } from './search/search.component';
import {PageHomeComponent} from './page-home/page-home.component';
import {PageAboutComponent} from './page-about/page-about.component';
import {PageContactComponent} from './page-contact/page-contact.component';
import {PageTermConditionComponent} from './page-term-condition/page-term-condition.component';
import {CreateBlogComponent} from './create-blog/create-blog.component';

export const routes: Routes = [
    {
        path: '', 
        component: PagesComponent,
        children:[
            { path:'', redirectTo:'dashboard', pathMatch:'full' },
            { path: 'dashboard', loadChildren: 'app/pages/dashboard/dashboard.module#DashboardModule', data: { breadcrumb: 'Dashboard' }  },          
            { path: 'membership', loadChildren: 'app/pages/membership/membership.module#MembershipModule', data: { breadcrumb: 'Membership' } },
            { path: 'ui', loadChildren: 'app/pages/ui/ui.module#UiModule', data: { breadcrumb: 'UI' } },
            { path: 'form-elements', loadChildren: 'app/pages/form-elements/form-elements.module#FormElementsModule', data: { breadcrumb: 'Form Elements' } },
            { path: 'tables', loadChildren: 'app/pages/tables/tables.module#TablesModule', data: { breadcrumb: 'Tables' } },
            { path: 'tools', loadChildren: 'app/pages/tools/tools.module#ToolsModule', data: { breadcrumb: 'Tools' } },
            { path: 'calendar', loadChildren: 'app/pages/calendar/app-calendar.module#AppCalendarModule', data: { breadcrumb: 'Calendar' } },
            { path: 'mailbox', loadChildren: 'app/pages/mailbox/mailbox.module#MailboxModule', data: { breadcrumb: 'Mailbox' } },
            { path: 'maps', loadChildren: 'app/pages/maps/maps.module#MapsModule', data: { breadcrumb: 'Maps' } },
            { path: 'charts', loadChildren: 'app/pages/charts/charts.module#ChartsModule', data: { breadcrumb: 'Charts' } },
            { path: 'dynamic-menu', loadChildren: 'app/pages/dynamic-menu/dynamic-menu.module#DynamicMenuModule', data: { breadcrumb: 'Dynamic Menu' }},
            { path: 'blank', component: BlankComponent, data: { breadcrumb: 'Blank page' } },
            { path: 'page-home', component: PageHomeComponent, data: { breadcrumb: 'Home Page' } },
            { path: 'page-about', component: PageAboutComponent, data: { breadcrumb: 'About Page' } },
            { path: 'page-contact', component: PageContactComponent, data: { breadcrumb: 'Contact Page' } },
            { path: 'page-term-condition', component: PageTermConditionComponent, data: { breadcrumb: 'Term And Condition' } },
            { path: 'search', component: SearchComponent, data: { breadcrumb: 'Search' } },
            { path: 'create-blog', component: CreateBlogComponent, data: { breadcrumb: 'Create Blog' }}
       ]
    }
];

export const routing: ModuleWithProviders = RouterModule.forChild(routes);