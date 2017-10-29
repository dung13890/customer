// @flow
'use strict';

import '../../../bower/jqTree/build/tree.jquery';
import Notification from './../partials/notification';
import Uploadfile from './../partials/uploadfile';

class Category {
  index(items, item) {
    var notification = new Notification();
    var uploadfile = new Uploadfile();
    uploadfile.init();
    var uploadbanner = new Uploadfile('#banner', '#banner-upload');
    uploadbanner.init();
    this.jqTree(items, item);

    notification.destroyRow(null, true);
    notification.flashMessage();
  }

  jqTree(items, item, selector = '#list') {
    var _$ = window.$;
    _$(selector).tree({
      closedIcon: _$('<i class="ion-plus"></i>'),
      openedIcon: _$('<i class="ion-minus"></i>'),
      data: items,
      dragAndDrop:false,
      autoOpen: false,
      selectable: false,
      onCreateLi: function(node, $li) {
        if (item != 0 && item.id == node.id) {
          return false;
        }
        $li.find('.jqtree-element')
          .append('<div class="btn-group pull-right tools">\
            <a href="'+laroute.route('backend.category.edit', {category: node.id})+'" class="btn btn-default btn-xs"><i class="ion-edit"></i></a> \
            <a href="'+laroute.route('backend.category.destroy', {category: node.id})+'" class="btn btn-xs btn-danger delete-action"><i class="ion-close-circled"></i></a>\
            </div>');
        }
    });
  }
}

export default window.category = new Category();
