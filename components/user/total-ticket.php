<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Ticket</title>
    <link rel="stylesheet" href="../../style/output.css">
</head>
<body class = "bg-gray-100 font-poppins">
        <?php include "../../header.html"; ?>
        <div class = "p-12 mx-auto">
        <div class = "container mx-auto px-9 py-8 pt-11">
            <div class = "flex flex-col md:flex-row md:items-center lg:text-left text-center justify-between mb-6">
            <h1 class = "text-gray-800 text-2xl font-bold xl:text-left">Total Tickets</h1>
            </div>

        <div class = "overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class = "w-full border-collapse">
            <thead>
                <tr class = "bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                <th class = "py-3 px-6 text-left">Date Created</th>
                <th class = "py-3 px-6 text-left">Submitted By:</th>
                <th class = "py-3 px-6 text-left">Subject</th>
                <th class = "py-3 px-6 text-left">Support type</th>
                <th class = "py-3 px-6 text-left">Category</th>
                <th class = "py-3 px-6 text-left">Description</th>
                <th class  = "py-3 px-6 text-left">Branch-Departments</th>
                <th class = "py-3 px-6 text-left">Status</th>
                </tr>   
            </thead>
            <tbody class = "text-gray-800 text-sm font-medium">
                    <tr class = "border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-4 px-6 text-left">10-24-25 / 20:21 PM</td>
                    <td class="py-4 px-6 text-left">Baragundong, Edna Bazel</td>
                    <td class="py-4 px-6 text-left">No Internet</td>
                    <td class="py-4 px-6 text-center">Support</td>
                    <td class="py-4 px-6 text-center">Support</td>
                    <td class="py-4 px-6 text-left">No Wifi</td>
                    <td class="py-4 px-6 text-center">Mandaluyong CSR</td>
                    <td class = "py-4 px-6 text-center">
                    <span class="bg-blue-500 text-white py-1 px-3 rounded-full text-xs">Pending</span>
                    </td>
                    </tr>

                    <tr class = "border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-4 px-6 text-left">10-21-25 / 13:21 PM</td>
                    <td class="py-4 px-6 text-left">Kalabarzon, Jonathan</td>
                    <td class="py-4 px-6 text-left">Error on SAP</td>
                    <td class="py-4 px-6 text-center">SAP</td>
                    <td class="py-4 px-6 text-center">SAP USER</td>
                    <td class="py-4 px-6 text-left">can't login</td>
                    <td class="py-4 px-6 text-center">Pampanga-Sales</td>
                    <td class = "py-4 px-6 text-center">
                    <span class="bg-yellow-500 text-white py-1 px-3 rounded-full text-xs">On hold</span>
                    </td>
                    </tr>
                    
                    <tr class = "border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-4 px-6 text-left">07-02-25 / 14:21 PM</td>
                    <td class="py-4 px-6 text-left">Kalabarzon, Jonathan</td>
                    <td class="py-4 px-6 text-left">Update Price</td>
                    <td class="py-4 px-6 text-center">Tagging</td>
                    <td class="py-4 px-6 text-center">Qpmi_Pro dDb</td>
                    <td class="py-4 px-6 text-left">C602681</td>
                    <td class="py-4 px-6 text-center">Pampanga-CSR</td>
                    <td class = "py-4 px-6 text-center">
                    <span class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">Open</span>
                    </td>
                    </tr>
            </tbody>
            </table>
        </div>
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
        </div>     
</body>
</html>