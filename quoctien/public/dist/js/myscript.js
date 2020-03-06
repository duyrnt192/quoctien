function alertPopup() {
  		alert("Chức năng đang được phát triển !!!");
};
$("div.alert").delay(5000).slideUp();
$(document).ready(function(){
	var _token = $("input[name='_token']").val();
    // $("#number_plate").change(function(e){
    //     var plateNumber = e.target.value;
    //     /*var citys = $(this).find('option:selected').attr("name");*/
    //     var _url = '/qt/repairs/vin-number/'+plateNumber;
    //     jQuery.ajax({
    //         url: _url,
    //         type:'GET',
    //         data: {plateNumber:plateNumber,_token:_token},
    //         success:function(data)
    //         {
    //             $("#vin_number").empty();
    //             $("#vin_number").html(data);
    //         }
    //     });
    //     var _url = '/qt/repairs/engine-number/'+plateNumber;
    //     jQuery.ajax({
    //         url: _url,
    //         type:'GET',
    //         data: {plateNumber:plateNumber,_token:_token},
    //         success:function(data)
    //         {
    //             $("#engine-number").empty();
    //             $("#engine-number").html(data);
    //         }
    //     });
    // });

    // $("#customer_code").change(function(e){
    //     var customerCode = e.target.value;
    //     var _url = '/qt/repairs/customer-name/'+customerCode;
    //     jQuery.ajax({
    //         url: _url,
    //         type:'GET',
    //         data: {customerCode:customerCode,_token:_token},
    //         success:function(data)
    //         {
    //             $("#customer_name").empty();
    //             $("#customer_name").html(data);
    //         }
    //     });
    //    var _url = '/qt/repairs/customer-phone/'+customerCode;
    //     jQuery.ajax({
    //         url: _url,
    //         type:'GET',
    //         data: {customerCode:customerCode,_token:_token},
    //         success:function(data)
    //         {
    //             $("#customer_phone").empty();
    //             $("#customer_phone").html(data);
    //         }
    //     });
    //     var _url = '/qt/repairs/customer-address/'+customerCode;
    //     jQuery.ajax({
    //         url: _url,
    //         type:'GET',
    //         data: {customerCode:customerCode,_token:_token},
    //         success:function(data)
    //         {
    //             $("#customer_address").empty();
    //             $("#customer_address").html(data);
    //         }
    //     });
    // });

    $("#city").change(function(e){
        $("#ward").html("<option  value='0'>"+'--- Xã / Phường ---'+"</option>");
        var city = e.target.value;
        var _url = '/qt/customers/district/'+city;
        jQuery.ajax({
            url: _url,
            type:'GET',
            data: {city:city,_token:_token},
            success:function(data)
            {
                $("#district").empty();
                $("#district").html(data);
            }
        });
    });

    $("#district").change(function(e){
        var district = e.target.value;
        var _url = '/qt/customers/ward/'+district;
        jQuery.ajax({
            url: _url,
            type:'GET',
            data: {district:district,_token:_token},
            success:function(data)
            {
                $("#ward").html(data);
            }
        });
    });

    $("#user_name").change(function(e){
        var email = e.target.value;
        var _url = '/qt/users/user-email/'+email;
        jQuery.ajax({
            url: _url,
            type:'GET',
            data: {email:email,_token:_token},
            success:function(data)
            {
                $("#user_id").html(data);
            }
        });
    });
});
