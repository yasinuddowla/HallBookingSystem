<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editModalLabel">Edit Hall</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $_config['base_url'] ?>hall/db_query.php" method="POST">
                    <input type="hidden" name="db_action" value="update">
                    <input type="hidden" name="id" id="editModalId">
                    <input type="hidden" name="manager_id" id="editModalManagerId">
                    <!-- Hall Information Section -->
                    <div class="hall-section">
                        <h5>Hall Information</h5>

                        <div class="row mb-2">
                            <label for="hallName" class="col-sm-4 col-form-label">Hall Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editModalName" name="hall_name" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="hallPhone" class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editModalPhone" name="hall_phone" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="hallAddress" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editModalAddress" name="hall_address" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="hallRent" class="col-sm-4 col-form-label">Rent</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="editModalRent" name="hall_rent" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="hallSize" class="col-sm-4 col-form-label">Size (sq ft)</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="editModalSize" name="hall_size" required>
                            </div>
                        </div>
                    </div>

                    <!-- Manager Information Section -->
                    <div class="manager-section">
                        <h5>Manager Information</h5>

                        <div class="row mb-2">
                            <label for="managerName" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editModalManagerName" name="manager_name" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="managerPhone" class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editModalManagerPhone" name="manager_phone" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="managerEmail" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="editModalManagerEmail" name="manager_email" required>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row mt-3">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-success">Add Hall</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Pass data to the Edit modal
        $('#editModal').on('show.bs.modal', function(event) {
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
                    $('#editModalId').val(data.id);
                    $('#editModalManagerId').val(data.manager_id);
                    $('#editModalName').val(data.name);
                    $('#editModalPhone').val(data.phone);
                    $('#editModalAddress').val(data.address);
                    $('#editModalRent').val(data.rent);
                    $('#editModalSize').val(data.size);
                    $('#editModalManagerName').val(data.manager_name);
                    $('#editModalManagerEmail').val(data.manager_email);
                    $('#editModalManagerPhone').val(data.manager_phone);
                }
            });
        });
    });
</script>