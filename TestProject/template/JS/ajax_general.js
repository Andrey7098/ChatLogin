$(document).ready(function(){
    MyAjax();
    setInterval(MyAjax,1000);
});
function MyAjax(){
    $.ajax({
        type:"POST",
        url:"/TestProject/index.php/chat/AjaxGeneral",
        success:function(data){
            $(".field_sms").html(data);
        }
    });
}