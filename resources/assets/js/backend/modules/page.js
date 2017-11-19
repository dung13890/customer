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
    this.addAttribute();
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
    _$('.grid-editor').gridEditor({
      new_row_layouts: [[4,4,4], [6,6], [9,3]],
      content_types: ['summernote'],
    });
    _$('.textarea-summernote').summernote({
      toolbar: toolbarSummernote,
      height:250,
      buttons: {
        layout: this.insertLayout
      },
      callbacks: {
        onImageUpload: function(files) {
          uploadfile.sendImage(files[0], laroute.route('backend.summernote.image'), _$(this));
        }
      }
    });
  }

  insertLayout (context) {
    var _$ = window.$;
    var ui = _$.summernote.ui;

    // create button
    var button = ui.button({
      contents: '<i class="ion-ios-monitor-outline"/>',
      tooltip: 'insert layout',
      click: function () {
        var node = _$(_$('.grid-editor').gridEditor('getHtml'))[0];
        context.invoke('editor.insertNode', node);
      }
    });

    return button.render();
  }

  addAttribute() {
    var _$ = window.$;
    var count = 0;
    var domAttributes = '';
    if (window.attributeRecruitment) {
      window.attributeRecruitment.map(function (index) {
        domAttributes += '<div class="group-attribute input-group"><div class="col-sm-4">\
        <input class="form-control" placeholder="'+ window.lang.get('repositories.label.key') +'" name="attributes[' + count + '][key]" value="'+index.key+'" type="text">\
        </div><div class="col-sm-6">\
        <input class="form-control" placeholder="'+ window.lang.get('repositories.label.value') +'" name="attributes[' + count + '][value]" value="'+index.value+'" type="text">\
        </div><div class="col-sm-2">\
        <a href="#" class="btn btn-danger delete-attribute"><i class="ion-trash-a"></i></a>\
        </div></div>';
        count++;
      });
      _$('.attributes-key-value').append(domAttributes);
    }
    _$('#btn-add-attribute').on('click', function (e) {
      e.preventDefault();
      _$('.attributes-key-value').append('<div class="group-attribute input-group"><div class="col-sm-4">\
        <input class="form-control" placeholder="'+ window.lang.get('repositories.label.key') +'" name="attributes[' + count + '][key]" type="text">\
        </div><div class="col-sm-6">\
        <input class="form-control" placeholder="'+ window.lang.get('repositories.label.value') +'" name="attributes[' + count + '][value]" type="text">\
        </div><div class="col-sm-2">\
        <a href="#" class="btn btn-danger delete-attribute"><i class="ion-trash-a"></i></a>\
        </div></div>');
      count++;
    });

    _$('.attributes-key-value').on('click', '.delete-attribute', function (e) {
      e.preventDefault();
      _$(this).closest('div.group-attribute').remove();
    });
  }
}

export default window.page = new Page();
