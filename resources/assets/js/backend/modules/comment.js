// @flow
'use strict';

import Datatable from './../partials/datatable';
class Comment {
  index () {
    var _$ = window.$;
    let columns = [
      { data: 'id', name: 'id', visible: false },
      { data: 'name',
        name: 'name',
        render: function (data, type, row) {
          return '<a href="' + row.url + '">' + row.name + '</a>';
        }
      },
      { data: 'email', name: 'email'},
      { data: 'content', name: 'content'},
      { data: 'created_at', name: 'created_at'},
      { data: 'locked',
        name: 'locked',
        render:function (data, type, row) {
          return row.locked == 1 ? '<span class="label label-default">OFF</span>' : '<span class="label label-primary">ON</span>';
        }
      },
    ];
    let searches = {
      data: function (d) {
        d.keywords = _$('input[name=keywords]').val();
        d.type = _$('select[name=type]').val();
      }
    };
    var datatable = new Datatable('comment', columns, searches);
    datatable.init();

    _$('#search-form').on('click', function (e) {
      e.preventDefault();

      datatable.refresh();
    });

    _$('#reset-form').on('click', function (e) {
      e.preventDefault();
      _$('input').val('');
      _$('select').prop('selectedIndex', 0);
      datatable.refresh();
    });
  }
}

export default window.comment = new Comment();
