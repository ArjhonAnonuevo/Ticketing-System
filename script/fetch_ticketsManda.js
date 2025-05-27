$(document).ready(function() {
  const tbody = $('tbody.text-gray-800');

  function fetchTickets() {
    $.ajax({
      url: '../../queries/tickets-mandaluyong.php', 
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        tbody.empty(); // clear existing rows

        if(response.data.length === 0) {
          tbody.append('<tr><td colspan="9" class="text-center py-4">No tickets found.</td></tr>');
          return;
        }

        response.data.forEach(function(ticket) {
          const status = 'Pending'; 
          const statusClass = 'bg-yellow-500';

          tbody.append(`
            <tr class="border-b border-gray-200 hover:bg-gray-100">
              <td class="py-4 px-6 text-left">#${ticket.ticket_id}</td>
              <td class="py-4 px-6 text-left">${ticket.requested_date}</td>
              <td class="py-4 px-6 text-left">${ticket.subject}</td>
              <td class="py-4 px-6 text-center">${ticket.support_type || ''}</td>
              <td class="py-4 px-6 text-center">${ticket.category || ''}</td>
              <td class="py-4 px-6 text-left">${ticket.description || ''}</td>
              <td class="py-4 px-6 text-center">${ticket.department || ''}</td>
              <td class="py-4 px-6 text-center">
                <span class="${statusClass} text-white py-1 px-3 rounded-full text-xs">${status}</span>
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
          `);
        });
      },
      error: function() {
        tbody.html('<tr><td colspan="9" class="text-center py-4 text-red-600">Failed to fetch data.</td></tr>');
      }
    });
  }

  fetchTickets();
});