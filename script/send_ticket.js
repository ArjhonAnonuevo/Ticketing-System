$(document).ready(function() {
    $("#ticket-form").on("submit", function(event) {
        event.preventDefault(); 

        let formData = new FormData();

        formData.append("subject", $("#subject").val());
        formData.append("type", $("#type").val());
        formData.append("category", $("#category").val());
        formData.append("description", $("#description").val());


       const fileInput = document.getElementById("attachments");
        if (fileInput && fileInput.files.length > 0) {
            formData.append("attachments", fileInput.files[0]); 
        }


        $.ajax({
            url: "../../queries/add_ticket.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    alert(response.message);
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX error: " + error);
            }
        });
    });
});
