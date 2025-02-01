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

  <div class="flex items-center justify-center min-h-screen px-6">
    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-lg">
      <!-- Form Header -->
      <h2 class="text-3xl font-bold text-gray-700 text-center mb-6">Add New Ticket</h2>

      <!-- Form -->
      <form action="#" method="POST">
        <!-- Subject -->
        <div class="mb-4">
          <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
          <input type="text" id="subject" name="subject"
            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
            placeholder="Enter ticket subject" required>
        </div>

        <!-- Support Type -->
        <div class="mb-4">
          <label for="support-type" class="block text-gray-700 font-medium mb-2">Support Type</label>
          <select id="support-type" name="support-type"
            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none transition">
            <option value="tagging">Tagging Price Update</option>
            <option value="sap">SAP Support</option>
            <option value="technical">Technical Support</option>
          </select>
        </div>

        <!-- Category -->
        <div class="mb-4">
          <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
          <input type="text" id="category" name="category"
            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
            placeholder="Enter category" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
          <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
          <textarea id="description" name="description" rows="4"
            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
            placeholder="Describe the issue..." required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
          <button type="submit"
            class="bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:scale-105 transition">
            Submit Ticket
          </button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>