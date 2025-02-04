<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Tickets</title>
  <link rel="stylesheet" href="../../style/output.css">
</head>
<body class="bg-gray-100 font-poppins">
  <?php include "../../header.html"; ?>
  <div class="container mx-auto px-9 py-8 pt-11">
    <!-- Branch Title & Entries Selector -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
      <h1 class="text-3xl font-bold text-green-700">Branch: <span class="text-gray-800 text-base">Mandaluyong</span></h1>

      <div class="mt-4 md:mt-0">
        <label for="entries" class="text-gray-700 text-sm font-medium">Show entries:</label>
        <select id="entries" class="ml-2 p-2 border rounded-md shadow-sm text-gray-700 bg-white focus:outline-none">
          <option value="5">5</option>
          <option value="10" selected>10</option>
          <option value="20">20</option>
          <option value="50">50</option>
        </select>
      </div>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Ticket ID</th>
            <th class="py-3 px-6 text-left">Date Created</th>
            <th class="py-3 px-6 text-left">Subject</th>
            <th class="py-3 px-6 text-center">Support Type</th>
            <th class="py-3 px-6 text-center">Category</th>
            <th class="py-3 px-6 text-left">Description</th>
            <th class="py-3 px-6 text-center">Department</th>
            <th class="py-3 px-6 text-center">Status</th>
            <th class="py-3 px-6 text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-800 text-sm font-medium">
          <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-4 px-6 text-left">#001</td>
            <td class="py-4 px-6 text-left">2024-02-01</td>
            <td class="py-4 px-6 text-left">Login Issue</td>
            <td class="py-4 px-6 text-center">Technical</td>
            <td class="py-4 px-6 text-center">Authentication</td>
            <td class="py-4 px-6 text-left">User unable to log in with correct credentials in SAP password expired</td>
            <td class="py-4 px-6 text-center">CNC</td>
            <td class="py-4 px-6 text-center">
              <span class="bg-yellow-500 text-white py-1 px-3 rounded-full text-xs">Pending</span>
            </td>
            <td class="py-4 px-6 text-center flex justify-center space-x-3">
              <a href="#" class="text-blue-500 hover:text-blue-700 text-lg">
                <i class="mdi mdi-eye"></i>
              </a>
              <a href="#" class="text-red-500 hover:text-red-700 text-lg">
                <i class="mdi mdi-trash-can"></i>
              </a>
            </td>
          </tr>

          <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-4 px-6 text-left">#002</td>
            <td class="py-4 px-6 text-left">2024-02-02</td>
            <td class="py-4 px-6 text-left">Network Issue</td>
            <td class="py-4 px-6 text-center">Technical</td>
            <td class="py-4 px-6 text-center">Connectivity</td>
            <td class="py-4 px-6 text-left">Office network is down, affecting all users.</td>
            <td class="py-4 px-6 text-center">Accounting</td>
            <td class="py-4 px-6 text-center">
              <span class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">Resolved</span>
            </td>
            <td class="py-4 px-6 text-center flex justify-center space-x-3">
              <a href="#" class="text-blue-500 hover:text-blue-700 text-lg">
                <i class="mdi mdi-eye"></i>
              </a>
              <a href="#" class="text-red-500 hover:text-red-700 text-lg">
                <i class="mdi mdi-trash-can"></i>
              </a>
            </td>
          </tr>

          <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-4 px-6 text-left">#003</td>
            <td class="py-4 px-6 text-left">2024-02-03</td>
            <td class="py-4 px-6 text-left">Software Update</td>
            <td class="py-4 px-6 text-center">Maintenance</td>
            <td class="py-4 px-6 text-center">System Upgrade</td>
            <td class="py-4 px-6 text-left">System upgrade caused unexpected errors.</td>
            <td class="py-4 px-6 text-center">CSR</td>
            <td class="py-4 px-6 text-center">
              <span class="bg-red-500 text-white py-1 px-3 rounded-full text-xs">Rejected</span>
            </td>
            <td class="py-4 px-6 text-center flex justify-center space-x-3">
              <a href="#" class="text-blue-500 hover:text-blue-700 text-lg">
                <i class="mdi mdi-eye"></i>
              </a>
              <a href="#" class="text-red-500 hover:text-red-700 text-lg">
                <i class="mdi mdi-trash-can"></i>
              </a>
            </td>

          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination Footer -->
    <div class="flex flex-col md:flex-row items-center justify-between mt-4 text-gray-700 text-sm">
      <p class="mb-2 md:mb-0">Showing 1 to 10 of 100 entries</p>

      <div class="flex space-x-2">
        <button class="px-3 py-1 border rounded-md bg-gray-200 hover:bg-gray-300">Previous</button>
        <button class="px-3 py-1 border rounded-md bg-blue-500 text-white">1</button>
        <button class="px-3 py-1 border rounded-md bg-gray-200 hover:bg-gray-300">2</button>
        <button class="px-3 py-1 border rounded-md bg-gray-200 hover:bg-gray-300">Next</button>
      </div>
    </div>
  </div>
</body>

</html>