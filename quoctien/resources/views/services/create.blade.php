@extends('master')
@section('title','Hệ thống Quốc Tiến - Hà Giang MôTô')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="../../dist/js/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('dist/css/jquery-ui.min.css')}}">
<script src="{{asset('dist/js/jquery-ui.min.js')}}" type="text/javascript"></script>
@endsection
@section('contents')
	<div class="page-breadcrumb">
	    <div class="row align-items-center">
	        <div class="col-5">
	            <h4 class="page-title">Dịch vụ</h4>
	            <div class="d-flex align-items-center">
	                <nav aria-label="breadcrumb">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="#">Hệ thống Quốc Tiến - Hà Giang MôTô</a></li>
	                        <li class="breadcrumb-item active" aria-current="page">Tiếp nhận dịch vụ</li>
	                    </ol>
	                </nav>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="container-fluid">
        @include('commons.error')
        @include('commons.alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(array('route' => 'services.store','method'=>'POST','class'=>'form-horizontal form-material')) !!}
                            <input type="hidden" name="CreatedBy" value="{{$userLogin->ID}}">
                            <input type="hidden" name="UpdatedBy" value="{{$userLogin->ID}}">
                            <input type="hidden" name="KhachHangID" id="customer_id" >
                            @csrf
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col-6">
                            			<label>Biển số xe</label><br>
                                        <input type="text" id="plate_number" required="" name="BienSo" placeholder="Biển số xe" class="form-control form-control-line">
                            		</div>
                            		<div class="col-6">
                            			<label>Mã khách Hàng</label><br>
                                        <input type="text" id="customer_code" required="" placeholder="Mã khách hàng" class="form-control form-control-line">
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Tên khách hàng</label>
                                        <input id="customer_name" type="text" placeholder="Tên khách hàng" class="form-control form-control-line">
                            		</div>
                            		<div class="col">
                            			<label>Số khung</label>
                                        <input type="text" id="vin_number" disabled="" placeholder="Số khung" name="SoKhung" class="form-control form-control-line">
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Điện thoại</label>
                                        <input type="text" class="form-control form-control-line" name="DienThoai1" placeholder="Điện thoại" title="Số điện thoại không đúng, vui lòng kiểm tra lại" id="customer_phone">
                            		</div>
                            		<div class="col">
                            			<label>Số máy</label>
                                        <input type="text" id="engine-number" disabled="" placeholder="Số máy" class="form-control form-control-line">
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Ngày mua</label>
                            			<input type="date" placeholder="Ngày mua" class="form-control form-control-line">
                            		</div>
                            		<div class="col">
                            			<label>Số KM</label>
                                        <input type="number" name="Km" placeholder="Số KM" class="form-control form-control-line">
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Địa chỉ</label>
                                        <textarea name="DiaChi" id="customer_address" rows="5"   class="form-control form-control-line"></textarea>
                            		</div>
                            		<div class="col">
                            			<label>Yêu cầu khách hàng</label>
                            			<textarea name="YeuCauKhachHang" id="" rows="5"   class="form-control form-control-line"></textarea>
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Tư vấn sửa chữa</label>
                            			<textarea name="TuVanSuaChua" id="" rows="5" class="form-control form-control-line"></textarea>
                            		</div>
                            		<div class="col">
                            			<label>Chữ ký</label>
                            			<textarea name="ChuKy" id="" rows="5" class="form-control form-control-line"></textarea>
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Lưu tiếp nhận</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<!-- Script -->
<script type="text/javascript">
  // CSRF Token
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $(document).ready(function(){
    $( "#plate_number" ).autocomplete({
      source: function( request, response ) {
        // Fetch data
        $.ajax({
          url:"{{route('getPlateNumber')}}",
          type: 'post',
          dataType: "json",
          data: {
             _token: CSRF_TOKEN,
             search: request.term
          },
          success: function( data ) {
             response( data );
          }
        });
      },
      select: function (event, ui) {
        $('#plate_number').val(ui.item.label); 
        $('#vin_number').val(ui.item.SoKhung); 
        $('#engine-number').val(ui.item.SoMay); 
        return false;
      }
    });

    $( "#customer_code" ).autocomplete({
      source: function( request, response ) {
        // Fetch data
        $.ajax({
          url:"{{route('getCustomerCode')}}",
          type: 'post',
          dataType: "json",
          data: {
             _token: CSRF_TOKEN,
             search: request.term
          },
          success: function( data ) {
             response( data );
          }
        });
      },
      select: function (event, ui) {
        $('#customer_id').val(ui.item.value); 
        $('#customer_code').val(ui.item.label); 
        $('#customer_name').val(ui.item.TenKhachHang); 
        $('#customer_phone').val(ui.item.DienThoai1); 
        $('#customer_address').val(ui.item.DiaChi); 
        return false;
      }
    });

  });
</script>
@endsection