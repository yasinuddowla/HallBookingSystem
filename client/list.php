<?php
// Fetch clients
$query = "SELECT * FROM client";
$clients = $pdoConnection->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5">
    <h1>Client List</h1>
    <div class="text-end">
        <!-- Add Client Button -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
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
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $client['id'] ?>" data-name="<?= $client['name'] ?>" data-phone="<?= $client['phone'] ?>" data-address="<?= $client['address'] ?>" data-email="<?= $client['email'] ?>">
                            Edit
                        </button>

                        <!-- Delete Button (opens the modal) -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $client['id'] ?>">
                            Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>