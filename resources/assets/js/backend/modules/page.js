// @flow
'use strict';

import Datatable from './../partials/datatable';
import Uploadfile from './../partials/uploadfile';
import toolbarSummernote from './../partials/toolbar';
class Page {
  index () {
    var _$ = window.$;
    let columns = [
      { data: 'id', name: 'id', visible: false },
      { data: 'name',
        name: 'name',
        render: function (data, type, row) {
          return '<a href="' + window.laroute.route('page.show', {slug: row.slug}) + '">' + row.name + '</a>';
        }
      },
      { data: 'ceo_keywords', name: 'ceo_keywords'},
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
      }
    };
    var datatable = new Datatable('page', columns, searches);
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

  form() {
    var _$ = window.jQuery;
    var uploadfile = new Uploadfile();
    uploadfile.init();
    var uploadicon = new Uploadfile('#icon', '#icon-upload');
    uploadicon.init();
    _$('.datetimepicker').datetimepicker({
      format: 'DD/MM/YYYY HH:mm',
      locale: 'vi',
      widgetPositioning: {
        vertical: 'bottom'
      }
    });
    _$('.textarea-summernote').summernote({
      toolbar: toolbarSummernote,
      height:250,
      callbacks: {
        onImageUpload: function(files) {
          uploadfile.sendImage(files[0], laroute.route('backend.summernote.image'), _$(this));
        }
      }
    });
  }
}

export default window.page = new Page();
