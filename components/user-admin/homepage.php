<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Homepage</title>
  <link rel="stylesheet" href="../../style/output.css" />
</head>
<body class="bg-gray-100 font-poppins">
  <!-- Include Header -->
  <?php include "../../header.html"; ?>

  <div class="flex flex-col items-center justify-center min-h-screen">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 max-w-6xl w-full xl:p-6 p-8">
      <!-- Mandaluyong Branch -->
      <a href="view-ticket-mandaluyong.php" class="bg-green-500 p-9 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-4">
          <i class="mdi mdi-map-marker text-white text-4xl"></i>
          <div>
            <p class="text-white text-lg font-semibold">Mandaluyong Branch</p>
            <p class="text-white text-sm">Total: 150</p> <!-- Total tickets for Mandaluyong -->
          </div>
        </div>
        <i class="mdi mdi-chevron-right text-white text-2xl"></i>
      </a>

      <!-- Pampanga Branch -->
      <a href="#" class="bg-blue-500 p-9 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-4">
          <i class="mdi mdi-map-marker text-white text-4xl"></i>
          <div>
            <p class="text-white text-lg font-semibold">Pampanga Branch</p>
            <p class="text-white text-sm">Total: 120</p> <!-- Total tickets for Pampanga -->
          </div>
        </div>
        <i class="mdi mdi-chevron-right text-white text-2xl"></i>
      </a>

      <!-- Others Branch -->
      <a href="#" class="bg-yellow-500 p-9 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-4">
          <i class="mdi mdi-map-marker text-white text-4xl"></i>
          <div>
            <p class="text-white text-lg font-semibold">Others</p>
            <p class="text-white text-sm">Total: 80</p> <!-- Total tickets for Others -->
          </div>
        </div>
        <i class="mdi mdi-chevron-right text-white text-2xl"></i>
      </a>

      <!-- Total Tickets -->
      <a href="#" class="bg-yellow-500 p-9 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-4">
          <i class="mdi mdi-ticket-confirmation text-white text-4xl"></i>
          <div>
            <p class="text-white text-lg font-semibold">Total Tickets</p>
            <p class="text-white text-sm">Total: 500</p> <!-- Total tickets -->
          </div>
        </div>
        <i class="mdi mdi-chevron-right text-white text-2xl"></i>
      </a>

      <!-- Total Resolved Tickets -->
      <a href="#" class="bg-red-500 p-9 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-4">
          <i class="mdi mdi-check-circle text-white text-4xl"></i>
          <div>
            <p class="text-white text-lg font-semibold">Total Resolved Tickets</p>
            <p class="text-white text-sm">Total: 350</p> <!-- Total resolved tickets -->
          </div>
        </div>
        <i class="mdi mdi-chevron-right text-white text-2xl"></i>
      </a>

      <!-- Tagging -->
      <a href="#" class="bg-purple-500 p- rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-4">
          <i class="mdi mdi-tag text-white text-4xl"></i>
          <div>
            <p class="text-white text-lg font-semibold">Tagging</p>
            <p class="text-white text-sm">Total: 500</p> <!-- Total tags -->
          </div>
        </div>
        <i class="mdi mdi-chevron-right text-white text-2xl"></i>
      </a>

    </div>
  </div>
</body>

</html>