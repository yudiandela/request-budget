var tTemporaryMasterPrice;
$(document).ready(function(){

    tTemporaryMasterPrice = $('#table-temporary-masterprice').DataTable({
        ajax: SITE_URL + '/masterprice/get_data_temporary',
        columns: [
            
            { data: 'fiscal_year', name: 'fiscal_year'},
            { data: 'parts.part_number', name: 'parts.part_number'},
            { data: 'suppliers.supplier_code', name: 'suppliers.supplier_code'},
            { data: 'source', name: 'source'},
            { data: 'price_apr', name: 'price_apr', class: 'text-right'},
            { data: 'price_may', name: 'price_may', class: 'text-right'},
            { data: 'price_jun', name: 'price_jun', class: 'text-right'},
            { data: 'price_jul', name: 'price_jul', class: 'text-right'},
            { data: 'price_aug', name: 'price_aug', class: 'text-right'},
            { data: 'price_sep', name: 'price_sep', class: 'text-right'},
            { data: 'price_oct', name: 'price_oct', class: 'text-right'},
            { data: 'price_nov', name: 'price_nov', class: 'text-right'},
            { data: 'price_dec', name: 'price_dec', class: 'text-right'},
            { data: 'price_jan', name: 'price_jan', class: 'text-right'},
            { data: 'price_feb', name: 'price_feb', class: 'text-right'},
            { data: 'price_mar', name: 'price_mar', class: 'text-right'},

           
        ],
        order: [1, 'asc'],
        drawCallback: function(){
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

});

function on_delete(temporary_masterprice_id)
{
    $('#modal-delete-confirm').modal('show');
    $('#btn-confirm').data('value', temporary_masterprice_id);
}

function on_table_temporary()
{
    $('#modal-temporary').modal('show');
}

$('#btn-confirm').click(function(){
    var temporary_masterprice_id= $(this).data('value');
    $('#form-delete-' + temporary_masterprice_id).submit();
});
$('#btn-save').click(function(){
    $('#form-temporary').submit();
});