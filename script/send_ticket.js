$(document).ready(function () {
  // Define category options without "Others"
  const categoryOptions = {
    "Tagging price update": ["QPMI_DB", "SOA_DB", "QPC_DB", "HRI_DB"],
    "Support (Technical)": ["No Internet", "Outlook Email", "Remote Desktop", "Printer", "Phone Line"],
    "SAP": ["SAP User", "Restart", "Update changes", "Cant print"]
  };

  function updateCategoryDropdown(type) {
    const $category = $("#category");
    $category.empty();

    const options = categoryOptions[type] || [];
    $.each(options, function (index, value) {
      $category.append($("<option></option>").val(value).text(value));
    });

    // Optional: set the first option as selected
    $category.val(options[0]);
  }

  // Initial population and trigger change
  updateCategoryDropdown($("#type").val());
  $("#category").trigger("change");

  // On Support Type change
  $("#type").on("change", function () {
    updateCategoryDropdown($(this).val());
    $("#category").trigger("change");
  });

  // Handle form submission
  $("#ticket-form").on("submit", function (event) {
    event.preventDefault();
    let formData = new FormData(this);

    $.ajax({
      url: "../../queries/add_ticket.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
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
      error: function (xhr, status, error) {
        alert("AJAX error: " + error);
      }
    });
  });
});
