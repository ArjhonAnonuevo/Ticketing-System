
$(document).ready(function() {
    $("#ticket-form").on("submit", function(event) {
        event.preventDefault(); 
        let formData = new FormData(this);

        $.ajax({
            url: "../../queries/add_ticket.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                   Swal.fire({
                        title: response.message,
                        icon: "success"
                   }).then(() => {
                        window.location.reload();
                    });

                } else {
                    Swal.fire({
                        title: response.message,
                        icon: "error"
                    })
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX error: " + error);
            }
        });
    });
});
