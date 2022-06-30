@extends('layouts.master')

@section('title')
	Update Master Price
@endsection

@section('content')

@php($active = 'masterprice')

<div class="container">
    <div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Update Master Price</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li><a href="{{ route('masterprice.index') }}">Upload Master Price</a></li>
                    <li class="active">
                        Update Master Price
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
                     <form id="form-add-edit" action="{{ route('masterprice.update', $masterprice->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Fiscal Year<span class="text-danger">*</span></label>
                                <input type="text" name="fiscal_year" placeholder="Fiscal Year" class="form-control tinymce" required="required" value="{{$masterprice->fiscal_year}}">
                                <span class="help-block"></span>
                           </div>
                            
                           <div class="form-group">
                                <label class="control-label">Supplier Code</label>
                                <select name="supplier_id" class="select2" data-placeholder="Select Part Number" required="required" value="{{ $masterprice->suppliers->supplier_code }}">
                                    <option></option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ $supplier->id == $masterprice->supplier_id ? 'selected=selected' : '' }}>{{ $supplier->supplier_code }} - {{ $supplier->supplier_name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block"></span>
                           </div>
                           
                           <div class="form-group">
                                <label class="control-label">Source<span class="text-danger">*</span></label>
                                <input type="text" name="source" placeholder="Source" class="form-control tinymce" required="required"  value="{{$masterprice->source}}">
                                <span class="help-block"></span>
                           </div>

                           <div class="form-group">
                                <label class="control-label">Part Number</label>
                                <select name="part_id" class="select2" data-placeholder="Select Part Number" required="required" value="{{ $masterprice->parts->part_number}}">
                                    <option></option>
                                    @foreach ($parts as $part)
                                        <option value="{{ $part->id }}" {{ $part->id == $masterprice->part_id ? 'selected=selected' : '' }}>{{ $part->part_number }} - {{ $part->part_name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block"></span>
                           </div>

                           
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                                <label class="control-label">Price April<span class="text-danger">*</span></label>
                                <input type="number" name="price_apr" placeholder="Price April" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_apr}}" ></input>
                                <span class="help-block"></span>
                           </div>
                           <div class="form-group">
                                <label class="control-label">Price May<span class="text-danger">*</span></label>
                                <input type="number" name="price_may" placeholder="Price May" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_may}}" ></input>
                                <span class="help-block"></span>
                           </div>
                           <div class="form-group">
                                <label class="control-label">Price June<span class="text-danger">*</span></label>
                                <input type="number" name="price_jun" placeholder="Price June" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_jun}}" ></input>
                                <span class="help-block"></span>
                           </div>
                           <div class="form-group">
                                <label class="control-label">Price July<span class="text-danger">*</span></label>
                                <input type="number" name="price_jul" placeholder="Price July" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_jul}}" ></input>
                                <span class="help-block"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                                <label class="control-label">Price August<span class="text-danger">*</span></label>
                                <input type="number" name="price_aug" placeholder="Price August" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_aug}}" ></input>
                                <span class="help-block"></span>
                           </div>
                           <div class="form-group">
                                <label class="control-label">Price Sepetember<span class="text-danger">*</span></label>
                                <input type="number" name="price_sep" placeholder="Price Sepetember" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_sep}}" ></input>
                                <span class="help-block"></span>
                           </div>
                           <div class="form-group">
                                <label class="control-label">Price October<span class="text-danger">*</span></label>
                                <input type="number" name="price_oct" placeholder="Price October" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_oct}}" ></input>
                                <span class="help-block"></span>
                           </div>
                           <div class="form-group">
                                <label class="control-label">Price November<span class="text-danger">*</span></label>
                                <input type="number" name="price_nov" placeholder="Price November" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_nov}}" ></input>
                                <span class="help-block"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                                <label class="control-label">Price December<span class="text-danger">*</span></label>
                                <input type="number" name="price_dec" placeholder="Price December" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_dec}}" ></input>
                                <span class="help-block"></span>
                           </div>
                           <div class="form-group">
                                <label class="control-label">Price January<span class="text-danger">*</span></label>
                                <input type="number" name="price_jan" placeholder="Price January" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_jan}}" ></input>
                                <span class="help-block"></span>
                           </div>
                           <div class="form-group">
                                <label class="control-label">Price February<span class="text-danger">*</span></label>
                                <input type="number" name="price_feb" placeholder="Price February" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_feb}}" ></input>
                                <span class="help-block"></span>
                           </div>
                           <div class="form-group">
                                <label class="control-label">Price March<span class="text-danger">*</span></label>
                                <input type="number" name="price_mar" placeholder="Price March" class="form-control tinymce text-right" required="required" rows="5"  value="{{$masterprice->price_mar}}" ></input>
                                <span class="help-block"></span>
                           </div>
                        </div>

                        <div class="col-md-12 text-right">
                            <hr>

                            <button class="btn btn-default btn-bordered waves-effect waves-light" type="reset">Reset</button>
                            <button class="btn btn-primary btn-bordered waves-effect waves-light" type="submit">Simpan</button>

                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
</div>


@endsection

@push('js')
<script src="{{ url('assets/js/pages/masterprice-add-edit.js') }}"></script>
@endpush