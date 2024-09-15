<?php
// Fetch bookings
$query = "SELECT 
            b.*, h.name AS hall_name, c.name AS client_name
        FROM booking b 
        JOIN hall h ON b.hall_id = h.id
        JOIN client c ON b.client_id = c.id ";
$bookings = $pdoConnection->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5">
    <h1>Booking List</h1>
    <div class="text-end">
        <!-- Add Booking Button -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="ph ph-plus"></i> Add Booking</button>
    </div>

    <!-- Bookings Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hall</th>
                <th>Client</th>
                <th>Date</th>
                <th>Slot</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking) : ?>
                <tr>
                    <td><?= htmlspecialchars($booking['hall_name']) ?></td>
                    <td><?= htmlspecialchars($booking['client_name']) ?></td>
                    <td><?= htmlspecialchars($booking['date']) ?></td>
                    <td><?= htmlspecialchars($booking['slot']) ?></td>
                    <td>
                        <!-- Delete Button (opens the modal) -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $booking['id'] ?>">
                            Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>