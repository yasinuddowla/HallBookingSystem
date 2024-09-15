<?php
$query = "SELECT * FROM client";
$clients = $pdoConnection->query($query)->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM hall";
$halls = $pdoConnection->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addModalLabel">Add Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $_config['base_url'] ?>booking/db_query.php" method="POST">
                    <input type="hidden" name="db_action" value="insert">
                    <h5>Booking Information</h5>
                    <div class="row mb-2">
                        <label for="hallId" class="col-sm-4 col-form-label">Hall</label>
                        <div class="col-sm-8">
                            <select name="hall_id" id="hallId" class="form-control" required>
                                <option value="" disabled selected>Choose</option>
                                <?php foreach ($halls as $hall) :
                                    echo "<option value=\"{$hall['id']}\">{$hall['name']}</option>";
                                endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="clientId" class="col-sm-4 col-form-label">Client</label>
                        <div class="col-sm-8">
                            <select name="client_id" id="clientId" class="form-control" required>
                                <option value="" disabled selected>Choose</option>
                                <?php foreach ($clients as $client) :
                                    echo "<option value=\"{$client['id']}\">{$client['name']}</option>";
                                endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="bookingDate" class="col-sm-4 col-form-label">Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="bookingDate" name="date" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="bookingSlot" class="col-sm-4 col-form-label">Slot</label>
                        <div class="col-sm-8">
                            <select name="slot" id="bookingSlot" class="form-control" required>
                                <option value="Day">Day</option>
                                <option value="Night">Night</option>
                            </select>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="row mt-3">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-success">Confirm Booking</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>