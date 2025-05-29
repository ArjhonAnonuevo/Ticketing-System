$(document).ready(function() {
   const tbody = $('tbody.text-gray-800');

   // Fetch tickets via AJAX and render rows
   function fetchTickets() {
      $.ajax({
         url: '../../queries/tickets-mandaluyong.php',
         method: 'GET',
         dataType: 'json',
         success: function(response) {
            renderTickets(response.data);
         },
         error: function() {
            tbody.html('<tr><td colspan="9" class="text-center py-4 text-red-600">Failed to fetch data.</td></tr>');
         }
      });
   }

   // Render tickets rows into tbody
   function renderTickets(tickets) {
      tbody.empty();

      if (tickets.length === 0) {
         tbody.append('<tr><td colspan="9" class="text-center py-4">No tickets found.</td></tr>');
         return;
      }

      tickets.forEach(ticket => {
         tbody.append(createTicketRow(ticket));
      });
   }

   // Create a single ticket row HTML string
   function createTicketRow(ticket) {
      return `
      <tr class="border-b border-gray-200 hover:bg-gray-100">
        <td class="py-4 px-6 text-left">#${ticket.ticket_id}</td>
        <td class="py-4 px-6 text-left">${ticket.requested_date}</td>
        <td class="py-4 px-6 text-left">${ticket.subject}</td>
        <td class="py-4 px-6 text-center">${ticket.support_type || ''}</td>
        <td class="py-4 px-6 text-center">${ticket.category || ''}</td>
        <td class="py-4 px-6 text-left">${ticket.description || ''}</td>
        <td class="py-4 px-6 text-center">${ticket.department || ''}</td>
        <td class="py-4 px-6 text-center flex justify-center space-x-3">
          <button type="button" 
                  class="text-blue-500 hover:text-blue-700 text-lg open-status-modal" 
                  data-id="${ticket.ticket_id}" 
                  data-status="${status}" 
                  aria-label="View ticket status #${ticket.ticket_id}">
            <i class="mdi mdi-eye"></i>
          </button>
          <button type="button" 
                  class="text-red-500 hover:text-red-700 text-lg delete-ticket" 
                  data-id="${ticket.ticket_id}"
                  aria-label="Delete ticket #${ticket.ticket_id}">
            <i class="mdi mdi-trash-can"></i>
          </button>
        </td>
      </tr>
    `;
   }

   // Show the status modal and populate it, with fadeIn effect
   function openStatusModal(ticketId, currentStatus) {
      $('#ticketId').val(ticketId);
      $('#statusSelect').val(currentStatus);
      $('#ticketStatusModal').fadeIn(200);

      $('#get-tickets').find('.ticket-details').remove();
      $.ajax({
         url: '../../queries/ticket-details.php',
         method: 'GET',
         data: {
            ticket_id: ticketId
         },
         dataType: 'json',
         success: function(data) {
            const detailsHtml = `
          <div class="bg-white rounded-xl p-6 space-y-6 overflow-y-auto min-h-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-600">Ticket ID</label>
                <div class="mt-1 text-base font-semibold text-gray-800">#${data.ticket_id}</div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-600">Status</label>
                <div class="mt-1 inline-block px-3 py-1 rounded-full text-white text-sm ${
                  data.status_name === 'Resolved'
                    ? 'bg-green-500'
                    : data.status_name === 'Pending'
                    ? 'bg-yellow-500'
                    : 'bg-blue-500'
                }">${data.status_name}</div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-600">Last Modified Date</label>
                <div class="mt-1 text-base text-gray-900">${data.last_modified}</div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-600">Subject</label>
                <div class="mt-1 text-base text-gray-900">${data.subject}</div>
              </div>


              <div>
                <label class="block text-sm font-medium text-gray-600">Support Type</label>
                <div class="mt-1 text-base text-gray-900">${data.support_type || '-'}</div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-600">Category</label>
                <div class="mt-1 text-base text-gray-900">${data.category || '-'}</div>
              </div>

            </div>

            <div>
              <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
              <textarea
                id="description"
                class="w-full mt-1 p-3 border border-gray-300 rounded-md bg-gray-50 text-sm text-gray-800 resize-none"
                rows="5"
                readonly
              >${data.description || ''}</textarea>
            </div>
             <div>
      <label class="block text-sm font-medium text-gray-600 mb-1">File Attachment</label>
      <div class="mt-1">
        ${
          data.attachments
            ? `<a href="${data.attachments}" target="_blank" class="text-sm text-blue-600 hover:underline">
                 ${data.attachments.split('/').pop()}
               </a>`
            : `<p class="text-sm text-gray-500 italic">No attachment available.</p>`
        }
      </div>
    </div>
          </div>
        `;
            $('#get-tickets').append(detailsHtml);
            $('#ticketStatusModal').fadeIn(200);
         },
         error: function() {
            alert('Failed to load ticket details.');
         }
      });
   }

   // Hide the status modal, with fadeOut effect
   function closeStatusModal() {
      $('#ticketStatusModal').fadeOut(200);
   }

   // Initialize event listeners
   function initEventListeners() {
      // Open modal when clicking the "eye" button
      $(document).on('click', '.open-status-modal', function(e) {
         e.preventDefault();
         const ticketId = $(this).data('id');
         const currentStatus = $(this).data('status');
         openStatusModal(ticketId, currentStatus);
      });

      // Close modal when clicking cancel button or modal close button
      $(document).on('click', '#closeModal, .modal-close', function() {
         closeStatusModal();
         window.location.reload();
      });

      // Close modal when clicking outside the modal container (on overlay)
      $(document).on('click', '#ticketStatusModal .modal-overlay', function() {
         closeStatusModal();
      });

      // Example: handle delete button (optional)
      $(document).on('click', '.delete-ticket', function() {
         const ticketId = $(this).data('id');
         if (confirm(`Are you sure you want to delete ticket #${ticketId}?`)) {
            // Add your delete AJAX call here
            console.log('Delete ticket', ticketId);
         }
      });
   }

   // Initialize app
   function init() {
      fetchTickets();
      initEventListeners();
   }

   init();
});