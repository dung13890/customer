// @flow
'use strict';

import Datatable from './../partials/datatable';
class Home {
  index () {
    var _$ = window.$;
    let columns = [
      { data: 'id', name: 'id', visible: false },
      { data: 'name',
        name: 'name',
        render: function (data, type, row) {
          return '<a href="' + window.laroute.route('backend.home.show', {home: row.id}) + '">' + row.name + '</a>';
        }
      },
      { data: 'email', name: 'email'},
      { data: 'phone', name: 'phone'},
      { data: 'description', name: 'description'}
    ];
    let searches = {
      data: function (d) {
        d.keywords = _$('input[name=keywords]').val();
      }
    };
    var datatable = new Datatable('home', columns, searches);
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

export default window.home = new Home();
