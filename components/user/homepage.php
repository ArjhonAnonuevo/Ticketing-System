<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Homepage</title>
  <link rel="stylesheet" href="../../style/output.css" />
</head>

<body class="bg-gray-100 font-poppins">
  <!-- Include Header -->
  <?php include "../../header.html"; ?>

  <div class="flex flex-col items-center justify-center min-h-screen xl:p-6 p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-6 max-w-4xl w-full">
      <!-- Add Ticket -->
      <a href="add-ticket.php" class="bg-green-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-4">
          <i class="mdi mdi-plus-circle text-white text-4xl"></i>
          <p class="text-white text-lg font-semibold">Add Ticket</p>
        </div>
        <i class="mdi mdi-chevron-right text-white text-2xl"></i>
      </a>

      <!-- My Tickets -->
      <a href="#" class="bg-blue-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-4">
          <i class="mdi mdi-ticket-account text-white text-4xl"></i>
          <p class="text-white text-lg font-semibold">My Tickets</p>
        </div>
        <i class="mdi mdi-chevron-right text-white text-2xl"></i>
      </a>

      <!-- Total Tickets -->
      <a href="total-ticket.php" class="bg-yellow-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-4">
          <i class="mdi mdi-ticket-confirmation text-white text-4xl"></i>
          <p class="text-white text-lg font-semibold">Total Tickets</p>
        </div>
        <i class="mdi mdi-chevron-right text-white text-2xl"></i>
      </a>

      <!-- Total Resolved Tickets -->
      <a href="#" class="bg-red-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-4">
          <i class="mdi mdi-check-circle text-white text-4xl"></i>
          <p class="text-white text-lg font-semibold">Total Resolved Tickets</p>
        </div>
        <i class="mdi mdi-chevron-right text-white text-2xl"></i>
      </a>
    </div>
  </div>
</body>

</html>