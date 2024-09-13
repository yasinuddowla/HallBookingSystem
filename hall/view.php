<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="viewModalLabel">Hall Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <th>Hall Name</th>
                        <td id="modalName"></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td id="modalPhone"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td id="modalAddress"></td>
                    </tr>
                    <tr>
                        <th>Hall Rent</th>
                        <td id="modalRent"></td>
                    </tr>
                    <tr>
                        <th>Hall Size (sqft)</th>
                        <td id="modalSize"></td>
                    </tr>
                    <tr>
                        <th>Manager Name</th>
                        <td id="modalManagerName"></td>
                    </tr>
                    <tr>
                        <th>Manager Email</th>
                        <td id="modalManagerEmail"></td>
                    </tr>
                    <tr>
                        <th>Manager Phone</th>
                        <td id="modalManagerPhone"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#viewModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var hallId = button.data('id'); // Extract info from data-* attributes

            // Fetch hall details
            $.ajax({
                url: 'db_query.php',
                type: 'GET',
                data: {
                    id: hallId
                },
                dataType: 'json',
                success: function(data) {
                    $('#modalName').text(data.name);
                    $('#modalPhone').text(data.phone);
                    $('#modalAddress').text(data.address);
                    $('#modalRent').text(data.rent);
                    $('#modalSize').text(data.size);
                    $('#modalManagerName').text(data.manager_name);
                    $('#modalManagerEmail').text(data.manager_email);
                    $('#modalManagerPhone').text(data.manager_phone);
                },
                error: function() {
                    $('#modalName').text('Error loading data');
                    $('#modalPhone').text('Error loading data');
                    $('#modalAddress').text('Error loading data');
                    $('#modalRent').text('Error loading data');
                    $('#modalSize').text('Error loading data');
                    $('#modalManagerName').text('Error loading data');
                    $('#modalManagerEmail').text('Error loading data');
                    $('#modalManagerPhone').text('Error loading data');
                }
            });
        });
    });
</script>