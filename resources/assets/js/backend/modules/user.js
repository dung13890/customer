// @flow
'use strict';

import Datatable from './../partials/datatable';
class User {
  index () {
    var _$ = window.$;
    let columns = [
      { data: 'id', name: 'id', visible: false },
      { data: 'username',
        name: 'username',
        render: function (data, type, row) {
          return '<a href="' + window.laroute.route('backend.user.show', {user: row.id}) + '">' + row.username + '</a>';
        }
      },
      { data: 'name', name: 'name'},
      { data: 'email', name: 'email'}
    ];
    let searches = {
      data: function (d) {
        d.keywords = _$('input[name=keywords]').val();
      }
    };
    var datatable = new Datatable('user', columns, searches);
    datatable.init();

    _$('#search-form').on('click', function (e) {
      e.preventDefault();
      datatable.refresh();
    });

    _$('#reset-form').on('click', function (e) {
      e.preventDefault();
      _$('input').val('');
      datatable.refresh();
    });
  }
}

export default window.user = new User();
