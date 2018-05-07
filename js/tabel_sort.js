$(function(){
  var pagerOptions = {
    container: $(".pager"),
    ajaxUrl: null,
    customAjaxUrl: function(table, url) { return url; },
    ajaxError: null,
    ajaxObject: { dataType: 'json' },
    ajaxProcessing: null,
    processAjaxOnInit: true,
    output: '{startRow:input} – {endRow} / {totalRows} rows',
    updateArrows: true,
    page: 0,
    size: 10,
    savePages : true,
    storageKey:'tablesorter-pager',
    pageReset: 0,
    fixedHeight: true,
    removeRows: false,
    countChildRows: false,
    cssNext: '.next',
    cssPrev: '.prev',
    cssFirst: '.first',
    cssLast: '.last',
    cssGoto: '.gotoPage',
    cssPageDisplay: '.pagedisplay',
    cssPageSize: '.pagesize',
    cssDisabled: 'disabled',
    cssErrorRow: 'tablesorter-errorRow'
  };
  $("table")
    .tablesorter({
      theme: 'blue',
      widthFixed: true,
      widgets: ['zebra', 'filter']
    })
    .bind('pagerChange pagerComplete pagerInitialized pageMoved', function(e, c){
      var msg = '"</span> event triggered, ' + (e.type === 'pagerChange' ? 'going to' : 'now on') +
        ' page <span class="typ">' + (c.page + 1) + '/' + c.totalPages + '</span>';
      $('#display')
        .append('<li><span class="str">"' + e.type + msg + '</li>')
        .find('li:first').remove();
    })
    .tablesorterPager(pagerOptions);
    var r, $row, num = 50,
      row = '<tr><td>Student{i}</td><td>{m}</td><td>{g}</td><td>{r}</td><td>{r}</td><td>{r}</td><td>{r}</td><td><button type="button" class="remove" title="Remove this row">X</button></td></tr>' +
        '<tr><td>Student{j}</td><td>{m}</td><td>{g}</td><td>{r}</td><td>{r}</td><td>{r}</td><td>{r}</td><td><button type="button" class="remove" title="Remove this row">X</button></td></tr>';
    $('button:contains(Add)').click(function(){
      // add two rows of random data!
      r = row.replace(/\{[gijmr]\}/g, function(m){
        return {
          '{i}' : num + 1,
          '{j}' : num + 2,
          '{r}' : Math.round(Math.random() * 100),
          '{g}' : Math.random() > 0.5 ? 'male' : 'female',
          '{m}' : Math.random() > 0.5 ? 'Mathematics' : 'Languages'
        }[m];
      });
      num = num + 2;
      $row = $(r);
      $('table')
        .find('tbody').append($row)
        .trigger('addRows', [$row]);
      return false;
    });
    $('table').delegate('button.remove', 'click' ,function(){
      var t = $('table');
      $(this).closest('tr').remove();
      t.trigger('update');
      return false;
    });
    $('button:contains(Destroy)').click(function(){
      var $t = $(this);
      if (/Destroy/.test( $t.text() )){
        $('table').trigger('destroyPager');
        $t.text('Restore Pager');
      } else {
        $('table').tablesorterPager(pagerOptions);
        $t.text('Destroy Pager');
      }
      return false;
    });
    $('.toggle').click(function(){
      var mode = /Disable/.test( $(this).text() );
      $('table').trigger( (mode ? 'disable' : 'enable') + 'Pager');
      $(this).text( (mode ? 'Enable' : 'Disable') + 'Pager');
      return false;
    });
    $('table').bind('pagerChange', function(){
      $('.toggle').text('Disable Pager');
    });
    $('.clear-pager-data').click(function(){
      $.tablesorter.storage( $('table'), 'tablesorter-pager', '' );
    });
    $('.goto').click(function(){
      $('table').trigger('pageAndSize', [1, 10]);
    });
});