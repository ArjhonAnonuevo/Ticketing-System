$(document).ready(function(){
    $('#login-button').click(function(event){
        event.preventDefault(); 

        let form = $("#login-form");
        $.ajax({
            type: "POST",
            url: "queries/login.php",  
            data: form.serialize(),  

            success: function(data) {
                if(data.status = "success"){

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
    })
})