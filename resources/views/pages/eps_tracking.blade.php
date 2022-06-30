@extends('layouts.master')

@section('title')
	EPS Tracking
@endsection

@section('content')

@php($active = 'eps_tracking')

<div class="container">
    <div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">EPS Tracking</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li class="active">
                        EPS Tracking
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
    <!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-sm-9">
                        <label>Filter PR Create Date</label>
                        <form class="form-inline">
                            <div class="form-group m-r-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" name="pr_created" placeholder="Filter PR Created Date" id="pr-created" value="{{ $periodFrom . ' - ' . $periodTo }}">
                                </div>
                            </div>
                            <div class="form-group mr-10">
                                <button class="btn btn-primary" type="button" id="btn-filter">Filter</button>
                                <button class="btn btn-danger" type="button" id="btn-reset">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3 text-right">
                        <div class="row">
                            <label>&nbsp;</label>
                        </div>
                        <a href="{{ route('eps_tracking.export') }}" class="btn btn-success" id="btn-export">Export To Excel</a>
                        <br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-colored table-inverse table-responsive table-small-font" id="table-eps_tracking">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">Approval Number</th>
                                    <th colspan="6" class="text-center" style="vertical-align:middle">Status PR</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">Item Number</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">Name Of Good</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">Quantity</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">UoM</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">Unit Price (Rp.)</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">Supplier Name</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">PO Date</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">PO Number</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">User Request</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">GR No</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">GR Date</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">Qty Receive</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">Qty Outstanding</th>
                                    <th rowspan="2" class="text-center" style="vertical-align:middle">Notes</th>
                                </tr>
                                <tr>
                                    <th class="text-center">User Create PR Date</th>
                                    <th class="text-center">Validation Budget</th>
                                    <th class="text-center">Approved By Dept. Head</th>
                                    <th class="text-center">Approved by GM</th>
                                    <th class="text-center">Approved By BOD</th>
                                    <th class="text-center">Receiving Date By Purch.</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
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

<script src="{{ url('assets/js/pages/eps_tracking.js') }}"></script>
@endpush