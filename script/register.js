
$(document).ready(function() {
    $('#branch').change(function() {
        if ($(this).val() === 'Others') {
            $('#other-input-container').show();  
        } else {
            $('#other-input-container').hide();  
        }
    });
    $('#department').change(function(){
        if($(this).val() === 'MIS'){
            $('#admin-credentials').show();
        } else {
         
            $('#admin-credentials').hide();
        }
    });

    // When the submit button is clicked
    $("#submit-form").click(function(event) {
        event.preventDefault(); 

        // Get the submitted form
        let form = $("#register");

        // Perform the AJAX request
        $.ajax({
            type: "POST",
            url: "queries/register.php",  
            data: form.serialize(),  

            success: function(data) {
                if (data.status === "success") {
                    Swal.fire({
                        title: data.message,
                        icon: "success"
                    }).then(() => {
                        // Redirect after successfull registration
                        window.location.href = "index.html";  
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: data.message,
                        icon: 'error'
                    });
                }
            },
            
            error: function(xhr, status, error) {
                alert("Error occurred while submitting the form: " + error);  
            }
        });
    });
});
