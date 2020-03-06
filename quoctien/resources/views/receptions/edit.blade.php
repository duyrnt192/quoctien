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
                        {!! Form::model($receptionLogin, ['method' => 'PATCH','route' => ['receptions.update', $receptionLogin->id],'class'=>'form-horizontal form-material']) !!}
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Email</label><br>
	                                    <input type="text" required="" disabled="" placeholder="email" name="email" value="{{$receptionLogin->email}}" class="form-control form-control-line">
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Mật khẩu</label>
                                        <div>
                                            <input type="password" required="" placeholder="Mật khẩu" name="password" class="form-control form-control-line">
                                        </div>
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Nhập mật khẩu</label>
                                        <div>
                                            <input type="password"  required="" placeholder="Xác nhận mật khẩu" name="repassword" class="form-control form-control-line">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Lưu</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
