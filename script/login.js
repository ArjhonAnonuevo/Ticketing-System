$(document).ready(function () {
    $("#login-button").click(function (event) {
        event.preventDefault(); 
        let form = $("#login-form");

        $.ajax({
            type: "POST",
            url: "queries/login.php",
            data: form.serialize(),
            dataType: "json",
            success: function (data) {
                if (data.status === "success") {
                    window.location.href = data.redirect;
                } else {
                    alert(data.message);
                }
            },
            error: function (xhr, status, error) {
                alert("Error occurred while submitting the form: " + error);
            },
        });
    });
});
