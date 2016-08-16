$(document).ready(function () {
    var $btnSend = $(".main-content .main-content__form form button");
    var $nameLabel = $("form #name");
    var $emailLabel = $("form #email");
    var $goalsLabel = $("form #goals");

    var successMessage;
    var $confirmationMessage = $("form span.success");
    $confirmationMessage.hide();

    $btnSend.click(function (event) {
        event.preventDefault();
        $.post("mail.php", {
            name: $nameLabel.val(),
            email: $emailLabel.val(),
            goals: $goalsLabel.val()
        }, function (response) {
            $confirmationMessage.slideDown();
        });
    });
});