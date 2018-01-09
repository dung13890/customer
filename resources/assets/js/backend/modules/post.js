// @flow
'use strict';

import Datatable from './../partials/datatable';
import Uploadfile from './../partials/uploadfile';
import toolbarSummernote from './../partials/toolbar';
import 'jquery-slimscroll';
class Post {
  index () {
    var _$ = window.$;
    let columns = [
      { data: 'id', name: 'id', visible: false },
      { data: 'name',
        name: 'name',
        render: function (data, type, row) {
          return '<a href="' + window.laroute.route('post.show', {slug: row.slug}) + '">' + row.name + '</a>';
        }
      },
      { data: 'ceo_keywords', name: 'ceo_keywords'},
      { data: 'category', name: 'category', orderable: false},
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
        d.category_id = _$('select[name=category_id]').val();
      }
    };
    var datatable = new Datatable('post', columns, searches);
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

  form () {
    var _$ = window.jQuery;
    var uploadfile = new Uploadfile();
    uploadfile.init();
    this.summernoteImageManager(uploadfile);
    _$('.slim-scroll').slimScroll({
      height: 300
    });
    _$('.grid-editor').gridEditor({
      new_row_layouts: [[4,4,4], [6,6], [9,3]],
      content_types: ['summernote'],
    });

    _$('.textarea-summernote').summernote({
      toolbar: toolbarSummernote,
      height:250,
      buttons: {
        layout: this.insertLayout,
        imagemanager: this.imageManager
      },
      callbacks: {
        onImageUpload: function(files) {
          uploadfile.sendImage(files[0], laroute.route('backend.summernote.image'), _$(this));
        }
      }
    });
  }

  summernoteImageManager (uploadfile) {
    uploadfile.getSummernoteImages();
    var _$ = window.$;
    _$('#get-images-summernote').on('click', function (e) {
      e.preventDefault();
      uploadfile.getSummernoteImages();
    });

    _$('#images-thumb-summernote').on('click', '.insert-image-summernote', function (e) {
      e.preventDefault();
      var img = _$(this).data('image');
      _$('.textarea-summernote').summernote("insertImage", img);
      _$('#summernote-images').modal('hide');
    });
  }

  imageManager () {
    var _$ = window.$;
    var ui = _$.summernote.ui;
    var button = ui.button({
      contents: '<i class="ion-ios-folder-outline"/>',
      tooltip: 'images manager',
      click: function () {
        _$('#summernote-images').modal('show');
      }
    });

    return button.render();
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
}

export default window.post = new Post();
