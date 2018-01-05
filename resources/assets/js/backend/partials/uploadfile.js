// @flow
'use strict';

class Upload {
  constructor (el = '#image', img = '#img-upload') {
    this._el = window.$(el);
    this._img = window.$(img);
  }

  init () {
    var _$ = window.$;
    var self = this;
    this._el.change(function () {
      let label = _$(this).val().replace(/\\/g, '/').replace(/.*\//, '');
      let input = _$(this).parents('.input-group').find(':text');
      if (input.length) {
        input.val(label);
      }
      self.readURL(this);
    });
  }

  readURL (input) {
    var _$ = window.$;
    var self = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        self._img.attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  sendImage(file, url, element, callback) {
    var _$ = window.$;
    var  data = new FormData();
    data.append("image", file);
    _$.ajax({
      data: data,
      type: "POST",
      url: url,
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        element.summernote("insertImage", data.url);
      },
      error: function(xhr, textStatus, error) {
        console.log(xhr.responseJSON.message);
      }
    });
    if (callback) {
      callback.apply(this);
    }
  }

  getSummernoteImages(year = '#select-year', month = '#select-month', folder = '#select-folder', el = '#images-thumb-summernote') {
    var _$ = window.$;
    var year = _$(year).val();
    var month = _$(month).val();
    var folder = _$(folder).val();
    _$(el).html('');
    var images = '';
    var url = laroute.route('backend.summernote.all.image', {'year': year, 'month': month, 'folder': folder});
    _$.get(url, (data) => {
      if (data.length > 0) {
        data.map((index) => {
          images += '<a class="insert-image-summernote" href="javascript:;" data-image="' + index.default + '">\
            <img class="img-thumbnail" src="' + index.thumb + '" />\
          </a>';
        });
      } else {
        images = '<p>' + window.lang.get('repositories.text.not_found_image') + '</p>';
      }
      _$(el).append(images);
    });
  }
}

export default Upload;
