// @flow
'use strict';

import Notification from './../partials/notification';
import 'jquery-slimscroll';
class Role {
  index () {
    var _$ = window.$;
    var notification = new Notification();
    notification.destroyRow(null, true);
  }

  form () {
    var _$ = window.$;
    _$('.slim-scroll').slimScroll({
      height: 500
    });
  }
}

export default window.role = new Role();
