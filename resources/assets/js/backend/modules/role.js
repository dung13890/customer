// @flow
'use strict';

import Notification from './../partials/notification';
import 'jquery-slimscroll';
class Role {
  index () {
    var _$ = window.$;
    var notification = new Notification();
    notification.destroyRow(null, 'tr');
  }
}

export default window.role = new Role();
