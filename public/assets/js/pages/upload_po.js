var tType;
$(document).ready(function(){
	tType = $('#table-upload_po').DataTable({
		ajax: {
            url:SITE_URL + '/upload_po/get_data',
            data:function(data){
                data.interval = $('#pr-receive').val();
            }
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        order:[3,'desc'],
        columns: [
            { data: 'approval_detail_id', name: 'approval_detail_id', visible:false},
            { data: 'approval_number', name: 'approval_number'},
            { data: 'remarks', name: 'remarks'},
            { data: 'created_at', name: 'created_at'},
            { data: 'pr_receive', name: 'pr_receive'},
            { data: 'po_number', name: 'po_number'},
            { data: 'po_date', name: 'po_date'},
            { data: 'quotation', name: 'quotation'},

        ],
        drawCallback: function(){
            $('[data-toggle="tooltip"]').tooltip();
            xeditClasser();
            initEditable();
        }
	});


    $('#btn-confirm').click(function(){
        var upload_po_id = $(this).data('value');
        $('#form-delete-' + upload_po_id).submit();
    });

    $('#pr-receive').daterangepicker({
        locale: {
            format: 'YYYY/MM/DD',
        },
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-success',
        cancelClass: 'btn-default',
    }).val('').attr("placeholder", "Filter PR Receive");

	$('#btn-filter').click(function(){
        var interval = $('#pr-receive').val().replace(/\s/g, '');
        var urlDownload = $('#btn-download').attr('href');
        var url = new URL(urlDownload);
        url.searchParams.set('interval', interval);

        $('#btn-download').attr('href', url.href);
		tType.draw();
    });

    $('#btn-reset').click(function(){
        $('#pr-receive').val('');
		tType.draw();
	});
});

function on_delete(upload_po_id)
{
    $('#modal-delete-confirm').modal('show');
    $('#btn-confirm').data('value', upload_po_id);
}

function on_import()
{
    $('#modal-import').modal('show');
}

$('#btn-import').click(function(){
    $('#form-import').submit();
});

function xeditClasser() {
    $('tbody tr').each(function(i, e) {
        var pk = $(this).attr('id');
        var pr_receive = $(this).find('td:nth-child(4)');
        var po_number = $(this).find('td:nth-child(5)');
        var po_date = $(this).find('td:nth-child(6)');
        var quotation = $(this).find('td:nth-child(7)');

        pr_receive.html('<a href="#" class="editable" data-type="date" data-pk="'+pk+'" data-name="pr_receive" data-title="PR Receive Date">'+pr_receive.text()+'</a>');
        po_number.html('<a href="#" class="editable" data-type="text" data-pk="'+pk+'" data-name="po_number" data-title="Enter PO Number">'+po_number.text()+'</a>');
        po_date.html('<a href="#" class="editable" data-type="date" data-pk="'+pk+'" data-name="po_date" data-title="Enter PO Date">'+po_date.text()+'</a>');
        quotation.html('<a href="#" class="editable" data-type="select" data-pk="'+pk+'" data-name="quotation" data-title="Choose Status Quotation" data-value="'+quotation.text()+'" data-source="[{value: &#39;Multi&#39;, text: &#39;Multi&#39;}, {value: &#39;Single&#39;, text: &#39;Single&#39;}]">'+quotation.text()+'</a>');

    });
}

function initEditable()
{
    $('.editable').editable({
        url: SITE_URL + '/upload_po/xedit',
        params: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        validate: function(value) {
            if($.trim(value) == '') return 'This field is required';
        },
        display: function(value, response) {
            return false;   //disable this method
        },
        success: function(data, config) {
            console.log(data);
            if (data.error) {
                return data.error;
            };
			tType.draw();
            // $(this).text(data.value);
        }
    });
}


