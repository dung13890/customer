// @flow
'use strict';

import '../../../bower/jqTree/build/tree.jquery';
import Notification from './../partials/notification';

class Menu {
  index(items, item) {
    var notification = new Notification();
    this.jqTree(items, item);
    this.getUrlFromRadio();

    notification.destroyRow(null, true);
    notification.flashMessage();
  }

  getUrlFromRadio() {
    var _$ = window.$;
    _$('input[name=type]:radio').change(function () {
      var url = _$(this).filter(':checked').data('url');
      _$('input[name=url]').val(url);
    });
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
            <a href="'+laroute.route('backend.menu.edit', {menu: node.id})+'" class="btn btn-default btn-xs"><i class="ion-edit"></i></a> \
            <a href="'+laroute.route('backend.menu.destroy', {menu: node.id})+'" class="btn btn-xs btn-danger delete-action"><i class="ion-close-circled"></i></a>\
            </div>');
        }
    });
  }
}

export default window.menu = new Menu();
