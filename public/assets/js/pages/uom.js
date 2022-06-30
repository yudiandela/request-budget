var tUom;
$(document).ready(function(){

	tUom = $('#table-uom').DataTable({
		aaSorting: [],
		ajax: SITE_URL + '/uom/get_data',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        columns: [
            { data: 'uom_code', name: 'uom_code'},
            { data: 'uom_sname', name: 'uom_sname'},
            { data: 'uom_fname', name: 'uom_fname'},
            { data: 'options', name: 'options', searching: false, sorting: false, class: 'text-center' }
        ],
        drawCallback: function(){
        	$('[data-toggle="tooltip"]').tooltip();
        }
	});


    $('#btn-confirm').click(function(){
        var uom_id = $(this).data('value');
        $('#form-delete-' + uom_id).submit();
    });

});

function on_delete(uom_id)
{
    $('#modal-delete-confirm').modal('show');
    $('#btn-confirm').data('value', uom_id);
}

function on_import()
{
    $('#modal-import').modal('show');
}

$('#btn-import').click(function(){
    $('#form-import').submit();
});