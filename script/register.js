
$(document).ready(function() {
    $('#branch').change(function() {
        if ($(this).val() === 'Others') {
            $('#other-input-container').show();  
        } else {
            $('#other-input-container').hide();  
        }
    });
    // When the submit button is clicked
    $("#submit-form").click(function(event) {
        event.preventDefault(); 

        // Get the form element
        let form = $("#register");

        // Perform the AJAX request
        $.ajax({
            type: "POST",
            url: "queries/register.php",  
            data: form.serialize(),  

            success: function(data) {
                if(data.status = "success"){
                    alert(data.message); 
                    window.location.href = "index.html";
                }  
                else{
                    alert(data.message);
                }
            },
            error: function(xhr, status, error) {
                alert("Error occurred while submitting the form: " + error);  
            }
        });
    });
});
