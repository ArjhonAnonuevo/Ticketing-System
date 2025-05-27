$(document).ready(function() {
  // Define category options without "Others"
  const categoryOptions = {
    "Tagging price update": ["QPMI_DB", "SOA_DB", "QPC_DB", "HRI_DB"],
    "Support (Technical)": ["No Internet", "Outlook Email", "Remote Desktop", "Printer", "Phone Line"],
    "SAP": ["SAP User", "Restart", "Update changes", "Cant print"],
    "Others": ["Others"]
  };

  function updateCategoryDropdown(type) {
    const $category = $("#category");
    $category.empty();

    const options = categoryOptions[type] || [];
    $.each(options, function(index, value) {
      $category.append($("<option></option>").val(value).text(value));
    });
    displayOptions(type);
  }


  function displayOptions(type) {
    if (type === "Others") {
      $("#category-div").css("display", "none");
      $("#category").prop("disabled", true);

      $("#others-div").css("display", "block");
      $("#others").prop("disabled", false);
    } else {
      $("#category-div").css("display", "block");
      $("#category").prop("disabled", false);

      $("#others-div").css("display", "none");
      $("#others").prop("disabled", true);
    }
  }
  // Initial population and trigger change
  const initialType = $("#type").val();
  updateCategoryDropdown(initialType);
  $("#category").trigger("change");

  // On Support Type change
  $("#type").on("change", function() {
    const selectedType = $(this).val();
    updateCategoryDropdown(selectedType);
    $("#category").trigger("change");
  });

  // Handle form submission
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
          });
        }
      },
      error: function(xhr, status, error) {
        alert("AJAX error: " + error);
      }
    });
  });
});