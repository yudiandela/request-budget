@extends('layouts.master')

@section('title')
    List of RB Expense
@endsection

@section('content')

@php($active = 'exp')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title"> List of RB Expense</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li class="active">
                         List of RB Expense
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-sm-4">
            <!-- @if (\Entrust::hasRole('budget'))
             <a href="{{ url('capex/create') }}" class="btn btn-inverse btn-bordered waves-effect waves-light m-b-20"><i class="mdi mdi-plus"></i> Create Capex</a>
             <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
            @endif -->
        </div><!-- end col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="table-responsive">     
                    <table class="table m-0 table-colored table-inverse" id="table-exp">
                        <thead>
                            <tr>
                                <th>Budget Number</th>
                                <th>Group</th>
                                <th>Line or Dept</th>
                                <th>Profit Center</th>
                                <!-- <th>Profit Center Code</th> -->
                                <th>Cost Center</th>
                                <th>Account Code</th>
                                <th>Project Name</th>
                                <th>Equipment Name</th>
                                <th>Import/Domestic</th>                                                                
                                <th>QTY</th>
                                <th>Curency</th>
                                <th>Price/Qty</th>
                                <th>Exchange Rate</th>
                                <th>Budgt. Before CR</th>
                                <!-- <th>CR</th> -->
                                <th>Budgt. After CR</th>
                                <th>Purchase Request</th>
                                <th>Receiving</th>
                                <th>SOP</th>
                                <th>1st D Payment Term</th>
                                <th>1st D Payment Amount</th>
                                <th>Final Payment Term</th>
                                <th>Final Payment Amount</th>                                
                                <th>april</th>
                                <th>mei</th>
                                <th>juni</th>
                                <th>juli</th>
                                <th>agustus</th>
                                <th>september</th>
                                <th>oktober</th>
                                <th>november</th>
                                <th>december</th>
                                <th>januari</th>
                                <th>februari</th>
                                <th>maret</th>
                                <!-- <th>Checking</th> -->
                                @if (\Entrust::hasRole('budget'))
                                    <th style="width: 100px">Opsi</th>
                                @endif
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<input type="hidden" id="is_budget" value="{{\Entrust::hasRole(['budget'])?'1':'0'}}">
<!-- Modal for question -->
<div class="modal fade in" tabindex="-1" role="dialog" id="modal-delete-confirm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Apakah anda yakin?</h4>
            </div>
            <div class="modal-body">Data yang dipilih akan dihapus, apakah anda yakin?</div>
            <div class="modal-footer">
                <button type="submit" id="btn-confirm" class="btn btn-danger btn-bordered waves-effect waves-light">Hapus</button>
                <button type="button" class="btn btn-default btn-bordered waves-effect waves-light" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

@if (session()->has('message'))
    <script type="text/javascript">
        show_notification("{{ session('title') }}","{{ session('type') }}","{{ session('message') }}");
    </script>
@endif
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<!-- <script src="{{ url('assets/js/pages/exprb.js') }}"></script> -->
<script type="text/javascript">
    // var tSales;
$(document).ready(function(){
    var is_budget = $('#is_budget').val();
    var csrfToken = $('#csrf-token').val();
    var tSales = $('#table-exp').DataTable({
        responsive : true,
        processing : true,
        serverSide : true,
        ajax : SITE_URL + '/exp/get_data',
   //      fnDrawCallback : function (oSettings) {
   //          budgetStatusStyler();
   //          budgetClosingStyler();
   //          budgetView();
            // if(is_budget==1){
            //  xeditClasser();
            //  initEditable();
            //  initSelectable();
            // }
   //      },
        columns : [
            { data: 'budget_no', name: 'budget_no'},
            { data: 'group', name: 'group'},
            { data: 'line', name: 'line'},
            { data: 'profit_center', name: 'profit_center'},
            // { data: 'profit_center_code', name: 'profit_center_code'},
            { data: 'cost_center', name: 'cost_center'},
            { data: 'acc_code', name: 'acc_code'},
            { data: 'project_name', name: 'project_name'},
            { data: 'equipment_name', name: 'equipment_name'},
            { data: 'import_domestic', name: 'import_domestic'},
            { data: 'qty', name: 'qty'},
            { data: 'cur', name: 'cur'},
            { data: 'price_per_qty', name: 'price_per_qty'},
            { data: 'exchange_rate', name: 'exchange_rate'},
            { data: 'budget_before', name: 'budget_before'},
            // { data: 'cr', name: 'cr'},
            { data: 'budgt_aft_cr', name: 'budgt_aft_cr'},          
            { data: 'po', name: 'po'},
            { data: 'gr', name: 'gr'},
            { data: 'sop', name: 'sop'},
            { data: 'first_dopayment_term', name: 'first_dopayment_term'},
            { data: 'first_dopayment_amount', name: 'first_dopayment_amount'},
            { data: 'final_payment_term', name: 'final_payment_term'},
            { data: 'final_payment_amount', name: 'final_payment_amount'},            
            { data: 'april', name: 'april'},
            { data: 'mei', name: 'mei'},
            { data: 'juni', name: 'juni'},
            { data: 'juli', name: 'juli'},
            { data: 'agustus', name: 'agustus'},
            { data: 'september', name: 'september'},
            { data: 'oktober', name: 'oktober'},
            { data: 'november', name: 'november'},
            { data: 'december', name: 'december'},
            { data: 'januari', name: 'januari'},
            { data: 'februari', name: 'februari'},
            { data: 'maret', name: 'maret'},
            // { data: 'checking', name: 'checking'},
            {
                data: null,
                className: "center",
                orderable: false,
                searchable: false,
                render: function(data){
                    if (is_budget == 1) {
                        return '<button class="btn btn-danger btn-xs" data-toggle="tooltip"  title="Hapus" onclick="on_delete('+data.id+')"><i class="mdi mdi-close"></i></button> <form action="/capex/'+data.id+'" method="POST" id="form-delete-'+data.id+'" style="display:none"><input type="hidden" name="_token" value="'+csrfToken+'"><input type="hidden" name="_method" value="DELETE"></form>'
                    } else {
                        return '';
                    }
                }
            }
        ],
        drawCallback: function(d) {
            $('[data-toggle="popover"]').popover();
        }
    });

    $('#btn-confirm').click(function(){
        var sales_id = $(this).data('value');
        $('#form-delete-' + sales_id).submit();
    });

});
</script>
@endpush