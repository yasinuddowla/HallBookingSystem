<!-- Edit Client Modal -->
<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClientModalLabel">Edit Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $_config['base_url'] ?>client/db_query.php" method="POST">
                    <input type="hidden" name="db_action" value="update">
                    <input type="hidden" name="id" id="editClientId">
                    <div class="mb-3">
                        <label for="editClientName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editClientName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editClientPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="editClientPhone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="editClientAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="editClientAddress" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="editClientEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editClientEmail" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Pass client data to the Edit Client modal
    $('#editClientModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var phone = button.data('phone');
        var address = button.data('address');
        var email = button.data('email');

        var modal = $(this);
        modal.find('#editClientId').val(id);
        modal.find('#editClientName').val(name);
        modal.find('#editClientPhone').val(phone);
        modal.find('#editClientAddress').val(address);
        modal.find('#editClientEmail').val(email);
    });
</script>