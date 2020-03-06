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
	                        <li class="breadcrumb-item active" aria-current="page">Thêm xe sửa chữa</li>
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
                        {!! Form::open(array('route' => 'repairs.store','method'=>'POST','class'=>'form-horizontal form-material')) !!}
                            <input type="hidden" name="CreatedBy" value="{{$userLogin->ID}}">
                            <input type="hidden" name="UpdatedBy" value="{{$userLogin->ID}}">
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col-6">
                            			<label>Biển số xe</label><br>
                                         <input required=""  type="text" style="text-transform: uppercase;" name="BienSo" placeholder="Biển số xe" class="form-control form-control-line">
                            		</div>
                            		<div class="col-6">
                            			<label>Model xe</label><br>
                                        <input type="text" id="model_car" name="Model2" placeholder="Model xe" class="form-control form-control-line">
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                            		<div class="col">
                            			<label>Số khung</label>
                                        <div >
                                            <input required="" type="text" style="text-transform: uppercase;" name="SoKhung" placeholder="Số khung" class="form-control form-control-line">
                                        </div>
                            		</div>
                            		<div class="col">
                            			<label>Số máy</label>
                                        <div>
                                            <input required="" type="text" style="text-transform: uppercase;" placeholder="Số máy" name="SoMay" class="form-control form-control-line">
                                        </div>
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="row">
                                    <div class="col">
                                        <label>Số sổ bảo hành</label>
                                        <div>
                                            <input type="text" name="SoSoBaoHanh" placeholder="Số sổ bảo hành" class="form-control form-control-line">
                                        </div>
                                    </div>
                            		<div class="col">
                            			<label>Ngày mua</label>
                            			<input type="date" placeholder="Ngày mua" name="NgayMua" class="form-control form-control-line">
                            		</div>
                            	</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Lưu sửa chữa</button>
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
    $( "#model_car" ).autocomplete({
      source: function( request, response ) {
        // Fetch data
        $.ajax({
          url:"{{route('getModelType')}}",
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
        $('#model_car').val(ui.item.label); 
        return false;
      }
    });

  });
</script>
@endsection