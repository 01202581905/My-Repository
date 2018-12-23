$(document).ready(function(){
    var json_tree = JSON.parse('{"vietnam":[]}');
    var i = 0;
    $.get('tree.json',function(data){
        console.log(data);
        var ma_tinhthanh;
        var ma_quanhuyen;
        var ma_xaphuong;        
        $.each(data, function (index, value) {  
            $("#tinhthanh").append('<option rel="' + index + '" value="'+value.code+'">'+value.name_with_type+'</option>');
        });
        $("#tinhthanh").change(function () {
            ma_tinhthanh = $(this).find('option:selected').attr('rel'); console.log(ma_tinhthanh);  
            $("#quanhuyen, #xaphuong").find("option:gt(0)").remove();
            $("#quanhuyen").find("option:first").text("Loading...");
            $.each(data, function (index, value) {
                if (index==ma_tinhthanh){
                    var data_child = this;
                    $.each(data_child['quan-huyen'], function (index, value) {
                        $("#quanhuyen").find("option:first").text("Chọn");
                        $("#quanhuyen").append('<option rel="' + index + '" value="'+value.code+'">'+value.name_with_type+'</option>');
                    });
                }
                
            });
            
        });
        $("#quanhuyen").change(function () {
            ma_quanhuyen = $(this).find('option:selected').attr('rel'); console.log(ma_quanhuyen);  
            $("#xaphuong").find("option:gt(0)").remove();
            $("#xaphuong").find("option:first").text("Loading...");
            $.each(data, function (index, value) {
                if (index==ma_tinhthanh){
                    var data_child = this;
                    $.each(data_child['quan-huyen'], function (index, value) {
                        if (index==ma_quanhuyen){
                            var data_child = this;
                            $.each(data_child['xa-phuong'], function (index, value) {
                                $("#xaphuong").find("option:first").text("Chọn");
                                $("#xaphuong").append('<option rel="' + index + '" value="'+value.code+'">'+value.name_with_type+'</option>');
                            });
                        }
                    });
                }
                
            });
            
        });        
    });
});