<!-- Add Client Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addModalLabel">Add Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $_config['base_url'] ?>client/db_query.php" method="POST">
                    <input type="hidden" name="db_action" value="insert">
                    <div class="mb-3">
                        <label for="clientName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="clientName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="clientPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="clientPhone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="clientAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="clientAddress" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="clientEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="clientEmail" name="email" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Add Client</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>