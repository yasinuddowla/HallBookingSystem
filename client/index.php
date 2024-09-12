<?php
require_once __DIR__ . '/../includes/templates/header.php';

// Fetch clients
$query = "SELECT * FROM client";
$clients = $pdoConnection->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h1>Client List</h1>
    <div class="text-end">
        <!-- Add Client Button -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addClientModal">
            <i class="fa fa-plus"></i> Add Client</button>
    </div>

    <!-- Clients Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client) : ?>
                <tr>
                    <td><?= htmlspecialchars($client['name']) ?></td>
                    <td><?= htmlspecialchars($client['phone']) ?></td>
                    <td><?= htmlspecialchars($client['address']) ?></td>
                    <td><?= htmlspecialchars($client['email']) ?></td>
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editClientModal" data-id="<?= $client['id'] ?>" data-name="<?= $client['name'] ?>" data-phone="<?= $client['phone'] ?>" data-address="<?= $client['address'] ?>" data-email="<?= $client['email'] ?>">
                            Edit
                        </button>

                        <!-- Delete Button -->
                        <form action="<?= $_config['base_url'] ?>client/delete.php" method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $client['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Client Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $_config['base_url'] ?>client/add.php" method="POST">
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

<!-- Edit Client Modal -->
<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClientModalLabel">Edit Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $_config['base_url'] ?>client/edit.php" method="POST">
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
<?php require_once __DIR__ . '/../includes/templates/footer.php'; ?>