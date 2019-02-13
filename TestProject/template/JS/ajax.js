$(document).ready(function (){
    MyAjax();
    setInterval(MyAjax,1000);
});
function MyAjax(){
    var login = $('#login_interlocutor').text();
    $.ajax({
        type:"POST",
        url:"/TestProject/index.php/chat/"+login+"/AjaxSmsLoginChat", 
        success: function(data){
            $('.sms').html(data);
        }
    });
}