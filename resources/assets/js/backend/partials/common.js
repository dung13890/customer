'use strict';

class Common {
  constructor () {
    this.layoutAction(window.$);
  }

  layoutAction (_$) {
    _$('.nav-dropdown').on('click', function () {
      _$(this).toggleClass('open');
    });

    _$('.navbar-toggler').on('click', function () {
      document.body.classList.toggle('sidebar-mobile-show');
    });
  }
}

export default new Common();
