<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Ticket</title>
    <link rel="stylesheet" href="../../style/output.css" />
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../script/send_ticket.js"></script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <style>
    #others-div
     {
      display: none ;
    }
  </style>
  </head>
  <body class="bg-gray-100 font-poppins">
    <?php include "../../header.html"; ?>
    <div class="min-h-screen p-8">
      <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-xl mx-auto">
        <h1 class="text-gray-700 text-lg font-semibold mb-4">Add New Ticket</h1>
        <form id="ticket-form" method="POST" enctype="multipart/form-data">

          <!-- Subject Input -->
          <div class="mb-6">
            <label for="subject" class="block text-gray-700 font-medium">Subject</label>
            <input type="text" id="subject" name="subject" class="border border-gray-300 rounded-md w-4/5 max-w-md px-4 py-2 mt-1 focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
          </div>

          <!-- Support Type Dropdown -->
          <div class="mb-6">
            <label for="type" class="block text-gray-700 font-medium">Support Type</label>
            <select name="type" id="type" class="border border-gray-300 rounded-md w-4/5 max-w-md px-4 py-2 mt-1" required>
              <option value="Tagging price update">Tagging price update</option>
              <option value="SAP">SAP</option>
              <option value="Support (Technical)">Support</option>
              <option value="Others">Others</option>
            </select>
          </div>

          <!--Category Dropdown -->
          <div class="mb-6" id = "category-div">
            <label for="category" class="block text-gray-700 font-medium">Category</label>
            <select name="category" id="category" class="border border-gray-300 rounded-md w-4/5 max-w-md px-4 py-2 mt-1" required>
            </select>
          </div>

          <!-- Other Category Dropdown -->
         <div class="mb-6 others" id = "others-div">
          <label for="category" class="block text-gray-700 font-medium">Others</label>
          <input name="category" id="others" class="border border-gray-300 rounded-md w-4/5 max-w-md px-4 py-2 mt-1" required>
        </div>

          <!-- Description Textarea -->
          <div class="mb-6">
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea name="description" id="description" placeholder="Enter your Request here...." class="w-full border-2 border-black ring-offset-black h-[150px]" required></textarea>
          </div>

          <!-- File Upload -->
          <div class="mb-4">
            <label for="attachments" class="block text-gray-700 font-medium">SRF Attachments (PDF only) or other Documents</label>
            <input type="file" name="attachments" id="attachments" accept="application/pdf,image/jpeg" required class="border border-gray-300 rounded-md px-4 py-2 mt-1 w-4/5 max-w-md">
          </div>

          <!-- Submit Button -->
          <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-md w-full">
            Submit Ticket
          </button>
        </form>
      </div>
    </div>
  </body>
</html>