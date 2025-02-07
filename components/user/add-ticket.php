<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Ticket</title>
  <link rel="stylesheet" href="../../style/output.css" />
</head>

<body class="bg-gray-100 font-poppins">
  <?php include "../../header.html"; ?>

  <div class="min-h-screen p-8">
    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-xl">
      <h1 class="text-gray-700 text-lg font-semibold mb-4">Add New Ticket</h1>

      <form action="process_ticket.php" method="POST">
        <div class="mb-4">
          <label for="subject" class="block text-gray-700 font-medium">Subject</label>
          <input type="text" id="subject" name="subject" class="border border-gray-300 rounded-md w-4/5 max-w-md px-4 py-2 mt-1 focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
        </div>

        <div class = "mb-4">
        <label for="subject" class="block text-gray-700 font-medium">Support Type</label>
          <select name="type" id="type">
              <option value="Tagging price update">Tagging price update</option>
              <option value="Tagging price update">SAP/option>
              <option value="Support">Support</option>
          </select>
        </div>
       

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-md w-full">
          Submit Ticket
        </button>
      </form>
    </div>
  </div>
</body>

</html>
