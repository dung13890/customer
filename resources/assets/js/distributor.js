// @flow
'use strict';

import laroute from './laroute';

class Distributor {

  constructor() {
    this.setupAjax();
    this.init();
  }

  setupAjax() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
      }
    });
  }

  init() {
    var self = this;
    var bubble_map = new Datamap({
      element: document.getElementById('vnm_map'),
      responsive: true,
      geographyConfig: {
        popupOnHover: true,
        highlightOnHover: true,
        borderColor: '#444',
        borderWidth: 0.5,
      },
      scope: 'vnm',
      setProjection: function (element) {
        var projection = d3.geo.mercator()
          .center([113, 17])
          .scale(1800);
        var path = d3.geo.path().projection(projection);
        return { path: path, projection: projection };
      },
      done: function(datamap) {
        datamap.svg.selectAll('.datamaps-subunit').classed("available", function (d) {
          if (d.id === window.distributorCd) {
            d3.select(this).classed('selected', true);
          }
          return (window.distributorCds.indexOf(d.id) >= 0 ) ? true : false;
        });
        datamap.svg.selectAll('.datamaps-subunit').on('click', function(geography) {
          datamap.svg.selectAll(".datamaps-subunit").classed('selected', false);
          d3.select(this).classed('selected', true);
          $.post(laroute.route('category.post.distributor'), {code: geography.id}, (data) => {
            if (data.status) {
              self.renderData(data.item);
            } else {
              $('#title-distributor').text('');
              $('#description-distributor').hide().text(window.messageNotFound).fadeIn();
            }
          });
        });
      }
    });
    $(window).on('resize', function() {
      bubble_map.resize();
    });
  }

  renderData(data) {
    $('#title-distributor').text(data.name);
    $('#title-distributor').click(function (e) {
      e.preventDefault();
      window.location.href = laroute.route('category.show', {'slug': data.slug});
    });
    $('#description-distributor').hide().html(data.description).fadeIn();
  }
}

export default new Distributor();
