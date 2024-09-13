<?php
// Fetch halls
$query = "SELECT * FROM hall";
$halls = $pdoConnection->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5">
    <h1>Hall List</h1>
    <div class="text-end">
        <!-- Add Hall Button -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="ph ph-plus"></i> Add Hall</button>
    </div>

    <!-- Halls Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Rent</th>
                <th>Size (sqft)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($halls as $hall) : ?>
                <tr>
                    <td><?= htmlspecialchars($hall['name']) ?></td>
                    <td><?= htmlspecialchars($hall['phone']) ?></td>
                    <td><?= htmlspecialchars($hall['rent']) ?></td>
                    <td><?= htmlspecialchars($hall['size']) ?></td>
                    <td>
                        <!-- View Button -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal" data-id="<?= $hall['id'] ?>">
                            View
                        </button>
                        <!-- Edit Button -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $hall['id'] ?>">
                            Edit
                        </button>

                        <!-- Delete Button (opens the modal) -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $hall['id'] ?>">
                            Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>