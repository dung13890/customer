// @flow
'use strict';

import Uploadfile from './../partials/uploadfile';
import Notification from './../partials/notification';
class Config {
  form() {
    var notification = new Notification();
    notification.flashMessage();
    var _$ = window.jQuery;
    var uploadfile = new Uploadfile();
    uploadfile.init();
    var uploadpopup = new Uploadfile('#popup_img', '#popup_img-upload');
    uploadpopup.init();
    _$('.textarea-summernote').summernote({
      height:200,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['font', ['fontname']],
        ['height', ['height']],
        ['view', ['codeview']],
      ]
    });
  }
}

export default window.config = new Config();
