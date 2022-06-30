$(document).ready(function(){

});
var tbl_url
var src_dest = $('#src_dest').val();
if(src_dest == 'src'){ 
	tbl_url = SITE_URL + '/expense/archive/ajaxsource';
}else{
	tbl_url = SITE_URL + '/expense/archive/ajaxdest'; 
}

var table = $('#data_table').DataTable({
      processing: true,
      serverSide: true,
      ajax: tbl_url,
	  "aoColumnDefs": [
            {
                "aTargets": [8],
                "mData": null,
                "mRender": function (data, type, full) {
                    return '<input type="checkbox" name="budget_number" class="budget_number" value="'+full.budget_no+'" onClick="recount();">';
                }
            },
            {
                "targets": 8,
                "orderable": false
            }
        ],
      columns: [
        { data: 'budget_no', name: 'budget_no' },
        { data: 'description', name: 'description' },
        { data: 'budget_plan', name: 'budget_plan' },
        { data: 'budget_used', name: 'budget_used' },
        { data: 'budget_remaining', name: 'budget_remaining' },
        { data: 'plan_gr', name: 'plan_gr' },
        { data: 'status', name: 'status' },
        { data: 'is_closed', name: 'is_closed' },
		
		

      ],
      ordering: false,
      searching: true,
      paging: true,
      info: false,
      drawCallback: function(d) {
        $('[data-toggle="tooltip"]').tooltip({html: true, "show": 500, "hide": 100});
		budgetClosingStyler();
		budgetStatusStyler();
		
      }

  });

function budgetStatusStyler()
{
    $('tr > td:nth-child(7)').each(function(index, element) {
        var value = $(this).text();
        if (value == 'Underbudget') {
            $(this).addClass('success');
        };

        if (value == 'Overbudget') {
            $(this).addClass('danger');
        };
    })
}

function budgetClosingStyler()
{
    $('tr > td:nth-child(8)').each(function(index, element) {
        var value = $(this).text();
        if (value == 'Open') {
            $(this).addClass('info');
        };

        if (value == 'Closed') {
            $(this).addClass('active');
        };
    })
}

function checkAll (bx) {

    $(':checkbox').each(function() {
        this.checked = bx.checked;                        
    });
}

function recount () {
    if ($('.budget_number:checked').size() < $('.budget_number').size()) {
        $('#checkall').prop("checked", false);
    }else{
        $('#checkall').prop("checked", true);
    }
}

function moveArchive() {
    var data = {
        status: status,
        budget_number: $( "form" ).serializeArray()
    };

    $('button.btn-warning').button('loading');

    if ($('.budget_number:checked').size() <= 0) {
        alert('Check at least one.');
        $('button.btn-warning').button('reset');
        return false;
    };
	$.getJSON(SITE_URL+"/expense/get_archive", data, function( data ) {

    }).done(function( data ) {
        if (data.error) {
            alert(data.error);
        };

        if (data.success) {
            alert (data.success);
        };

        table.ajax.reload( null, false );
        $('button').button('reset');
        $('#checkall').prop("checked", false);   
    });
}

function undoArchive() {
    var data = {
        status: status,
        budget_number: $( "form" ).serializeArray()
    };

    $('button.btn-warning').button('loading');

    if ($('.budget_number:checked').size() <= 0) {
        alert('Check at least one.');
        $('button.btn-warning').button('reset');
        return false;
    };
	$.getJSON(SITE_URL+"/expense/undo_archive", data, function( data ) {

    }).done(function( data ) {
        if (data.error) {
            alert(data.error);
        };

        if (data.success) {
            alert (data.success);
        };

        table.ajax.reload( null, false );
        $('button').button('reset');
        $('#checkall').prop("checked", false);
    });
}