
$(document).ready(function () {
	
	 //refresh interval in ms
    var chatInterval = 250;
    var $userName = $("#userName");
    var $chatOutput = $("#chatOutput");
    var $chatInput = $("#chatInput");
    var $chatSend = $("#chatSend");

    function sendMessage() {
        var userNameString = $userName.val();
        var chatInputString = $chatInput.val();

        $.get("./write.php", {
            username: userNameString,
            text: chatInputString
        });

        $userName.val("");
        retrieveMessages();
    }
	
	 //Paste content into chat output
    function retrieveMessages() {
        $.get("./read.php", function (data) {
            $chatOutput.html(data);
        });
    }

    $chatSend.click(function () {
        sendMessage();
    });

    setInterval(function () {
        retrieveMessages();
    }, chatInterval);
	
});