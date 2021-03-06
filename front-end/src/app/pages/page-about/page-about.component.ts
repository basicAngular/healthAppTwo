import { Component, OnInit, ViewEncapsulation } from '@angular/core';

@Component({
  selector: 'app-page-about',
  templateUrl: './page-about.component.html',
  styleUrls: ['./page-about.component.scss'],
  encapsulation: ViewEncapsulation.None
})
export class PageAboutComponent implements OnInit {
  public ckeditorContent:string;
  public config:any;
  constructor() {
    this.ckeditorContent = '<div>Hey we are testing CKEditor</div>';
    this.config = {
      uiColor: '#F0F3F4',
      height: '350',
      extraPlugins: 'divarea'
    };
  }

  onChange(event: any) {
    setTimeout(() => {
      this.ckeditorContent = event;
    });
  }
  onReady(event: any) { }
  onFocus(event: any) {
    console.log("editor is focused");
  }
  onBlur(event: any) {
  }

  ngOnInit() {
  }

}
