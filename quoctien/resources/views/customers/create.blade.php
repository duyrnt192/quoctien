@extends('master')
@section('title','Hệ thống Quốc Tiến - Hà Giang MôTô')
@section('head')
<script src="/dist/js/jquery-3.4.1.min.js"></script>
@endsection
@section('contents')
	<div class="page-breadcrumb">
	    <div class="row align-items-center">
	        <div class="col-5">
	            <h4 class="page-title">Khách hàng</h4>
	            <div class="d-flex align-items-center">
	                <nav aria-label="breadcrumb">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="#">Hệ thống Quốc Tiến - Hà Giang MôTô</a></li>
	                        <li class="breadcrumb-item active" aria-current="page">Thêm mới khách hàng</li>
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
                        {!! Form::open(array('route' => 'customers.store','method'=>'POST','class'=>'form-horizontal form-material')) !!}
                            <input type="hidden" name="CreatedBy" value="{{$userLogin->ID}}">
                            <input type="hidden" name="UpdatedBy" value="{{$userLogin->ID}}">
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Mã khách hàng</label>
                            			<input type="text" placeholder="Mã khách hàng" value="{{$customerCode}}" name="MaKhachHang" class="form-control form-control-line">
                            		</div>
                            		<div class="col">
                            			<label>Nhóm khách hàng</label>
                            			<select class="form-control form-control-line" name="KhachHangNhomID" id="customer_code">
                                    @foreach($custormerGroups  as $custormerGroup)
                                      <option  value="{{$custormerGroup->ID}}">{{$custormerGroup->MaKhachHangNhom}}</option>
                                    @endforeach
                                  </select>
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Tên khách hàng</label>
                                        <input type="text" placeholder="Tên khách hàng" value="Duy test" name="TenKhachHang" class="form-control form-control-line">
                                    </div>
                                    <div class="col">
                                        <label>Ngày sinh</label>
                                        <input type="date" placeholder="Ngày sinh" name="NgaySinh" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Email</label>
                                        <input type="email" value="abc@gmail.com" name="Email" placeholder="Email" class="form-control form-control-line">
                                    </div>
                                    <div class="col">
                                        <label>Giới tính</label> <br>
                                        <label><input type="radio" name="GioiTinh" value="1" checked> Nam</label>
                                        <label><input type="radio" name="GioiTinh" value="0"> Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Điện thoại 1</label>
                            			<input type="text" minlength="10" maxlength="11" pattern="[0][0-9]*" class="form-control form-control-line" name="DienThoai1" placeholder="Điện thoại 1" title="Số điện thoại không đúng, vui lòng kiểm tra lại" value="0987333654">
                            		</div>
                            		<div class="col">
                                        <label>Điện thoại 2</label>
                                        <input type="text" minlength="10" maxlength="11" pattern="[0][0-9]*" class="form-control form-control-line" name="DienThoai2" placeholder="Điện thoại 2" title="Số điện thoại không đúng, vui lòng kiểm tra lại" value="0955444111">
                                    </div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Số CMND</label>
                            			<input type="number" placeholder="Số CMND" value="17754445454" name="SoCMND" class="form-control form-control-line">
                            		</div>
                            		<div class="col">
                            			<label>Ngày cấp</label>
                            			<input type="date" placeholder="Ngày cấp" name="NgayCap" class="form-control form-control-line">
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Nơi cấp</label>
                            			<input type="text" placeholder="Nơi cấp" value="TTH" name="NoiCap" class="form-control form-control-line">
                            		</div>
                            		<div class="col">
                            			<label>Nghề nghiệp</label>
                            			<input type="text" placeholder="Nghề nghiệp" name="NgheNghiepID" class="form-control form-control-line">
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6 col-sm-12">
                                        <label>Tỉnh - Thành</label><br>
                                         <select class="form-control form-control-line" name="HK_TinhThanhID" id="city">
                                          <option value="0">-- Tỉnh - Thành -- </option>
                                           @foreach($cities  as $city)
                                            <option  value="{{$city->ID}}">{{$city->TenTinhThanh}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 col-sm-12">
                                        <label>Quận - Huyện</label><br>
                                        <select class="form-control form-control-line" name="HK_QuanHuyenID" id="district">
                                          <option value="0">-- Quận - Huyện -- </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-sm-12">
                                        <label>Phường - Xã</label> <br>
                                        <select class="form-control form-control-line" name="HK_PhuongXaID" id="ward">
                                          <option value="0">-- Phường - Xã -- </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label>Địa chỉ</label><br>
                                        <textarea name="DiaChi" id="" cols="100" rows="5">97 Tôn Đức Thắng</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Lưu khách hàng</button>
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
<script>
	$(document).ready(function() {
	    $('#city').select2();
        $('#district').select2();
        $('#ward').select2();
        $('#customer_code').select2();
	});
</script>
@endsection