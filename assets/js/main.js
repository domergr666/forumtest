$(".form-box input, .form-box select").on("focus",function() {
    $(this).parent().addClass("focus");
});
$(".form-box input, .form-box select").on("blur",function() {
    if($(this).parent().val() == "")
        $(this).parent().removeClass("focus");
});
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
$('#donateform').ajaxForm({
    url: '/ajax/donate.php',
    dataType: 'text',
    success: function(data) {
        data = $.parseJSON(data);
        switch(data.status) {
            case 'error':
                swal(data.title,  data.message,  data.status);
                break;
            case 'info':
            	swal(data.title,  data.message,  data.status);
            	setTimeout(function () {
            		location.href = data.url;
            	}, 3000);
            	break;
            case 'success':
                location.href = data.url;
                break;
        }
    },
});
$("img").mousedown(function(){
    return false;
});
$(document).on( 'click', '.last-arrow', function() {
	var buttonID = $(this).data("id");
	var lastbuys = $('#lastbuys');
    $.ajax({
        url: '/ajax/showbuys.php',
        type: 'POST',
        dataType: "text",
        data: {button: buttonID},
        success: function(data){
        	lastbuys.empty();
            lastbuys.append(data);
			$('[data-toggle="tooltip"]').tooltip();
        }
    });
});
function changeserv() {
    var selectBox = document.getElementById("changeserver");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	var showtovars = $('#showtovars');
	$.ajax({
        url: '/ajax/showtovars.php',
        type: 'POST',
        dataType: "text",
        data: {server: selectedValue},
        success: function(data){
        	showtovars.empty();
            showtovars.append(data);
        }
    });
}
