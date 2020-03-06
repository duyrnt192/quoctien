@extends('master')
@section('title','Hệ thống Quốc Tiến - Hà Giang MôTô')
@section('contents')
	<div class="page-breadcrumb">
	    <div class="row align-items-center">
	        <div class="col-5">
	            <h4 class="page-title">Dịch vụ</h4>
	            <div class="d-flex align-items-center">
	                <nav aria-label="breadcrumb">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="#">Hệ thống Quốc Tiến - Hà Giang MôTô</a></li>
	                        <li class="breadcrumb-item active" aria-current="page">Thêm mới nhân viên tiếp nhận</li>
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
                        {!! Form::open(array('route' => 'receptions.store','method'=>'POST','class'=>'form-horizontal form-material')) !!}
                            <div id="user_id"></div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Nhân viên</label><br>
	                                    <select class="form-control form-control-line" name="email" id="user_name" required="">
                                            <option  value="0">--- Nhân viên ---</option>
                                            @foreach($users  as $user)
                                            <option  value="{{$user->Email}}">{{$user->Email}}</option>
                                            @endforeach
                                        </select>
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
                                    <button class="btn btn-success">Thêm nhân viên tiếp nhận</button>
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
        $('#user_name').select2();
    });
</script>
@endsection