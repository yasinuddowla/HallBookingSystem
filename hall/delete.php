<!-- Hidden form to submit on delete confirmation -->
<form id="deleteForm" action="<?= $_config['base_url'] ?>hall/db_query.php" method="POST" style="display:none;">
    <input type="hidden" name="db_action" value="delete">
    <input type="hidden" name="id" id="deleteValue" value="">
</form>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this hall?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>


<script>
    // When the modal opens, set the ID to delete
    document.getElementById('deleteModal').addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var id = button.getAttribute('data-id'); // Extract ID
        document.getElementById('deleteValue').value = id; // Set ID in hidden form
    });

    // On confirmation, submit the form
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        document.getElementById('deleteForm').submit(); // Submit the hidden form
    });
</script>