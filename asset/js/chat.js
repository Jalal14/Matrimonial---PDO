$(document).ready(function () {
    setInterval(function () {
        var sender = $("#userId").val();
        var send_to = $("#friendId").val();
        $.ajax({
            url		: "?conversation_load-messages&send_to="+send_to+"&sender="+sender,
            type	: "post",
            data    : {
                sender  :   $("#userId").val(),
                send_to :   $("#friendId").val(),
                message :   $("#message").val()
            },
            success	: function (data) {
                $('#conversation').html(data);
            }
        });
    }, 1000);
	$("#send-button").on("click",function() {
		var sender = $("#userId").val();
		var send_to = $("#friendId").val();
		var message = $("#message").val();
		$.ajax({
			url		: "?conversation_conversation&send_to="+send_to+"&sender="+sender+"&message="+message,
			type	: "post",
            data    : {
                    sender  :   $("#userId").val(),
                    send_to :   $("#friendId").val(),
                    message :   $("#message").val()
            },
			success	: function (data) {
                $('input[name=message]').val("");
                setScroll();
			}
		});
		return false;
	});
	$('#conversation').ready(function () {
        setScroll();
    });
});

function setScroll() {
    $('#conversation').animate({
        scrollTop: $('#conversation').get(0).scrollHeight}, 5);
}