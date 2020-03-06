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
                          <li class="breadcrumb-item active" aria-current="page">Sửa chữa</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row justify-content-center">
        <!-- For defining autocomplete -->
      <input type="text" id='employee_search'>

      <!-- For displaying selected option value from autocomplete suggestion -->
      <input type="text" placeholder="id" id='employeeid' readonly>

      <!-- Script -->
      <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

          $( "#employee_search" ).autocomplete({
            source: function( request, response ) {
              // Fetch data
              $.ajax({
                url:"{{route('customer.index')}}",
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
               // Set selection
               $('#employee_search').val(ui.item.label); // display the selected text
               $('#employeeid').val(ui.item.value); // save selected id to input
               return false;
            }
          });

        });
      </script>
      </div>
  </div>
  <div class="pad" style="margin-bottom: 150px;"></div>
@endsection