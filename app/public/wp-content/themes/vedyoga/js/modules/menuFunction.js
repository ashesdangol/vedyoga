class Mymenu {
  // 1  DESCRIBE FEATURE OF AN OBJECT
  constructor() {
    this.openButton = $('.mobile-nav-btn');
    this.headerMenu = $('.header-menu__lists');
    this.main__header=$('#main__header');
    this.events();

  }
  // 2 EVENTS , INSTRUCTIONS
  events(){
    this.openButton.on('click',this.openMenu.bind(this));
  }

  // 3 ACTIONS DO IT methods functions
  openMenu(){
    this.openButton.toggleClass('x');
    this.headerMenu.toggleClass('nav-close');
    this.main__header.toggleClass('fullHeight');
    $('html,body').toggleClass('body-no-scroll__mobile');
  }

}

// export default menu;
export default Mymenu;
