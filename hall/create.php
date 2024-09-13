<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addModalLabel">Add Hall</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $_config['base_url'] ?>hall/db_query.php" method="POST">
                    <input type="hidden" name="db_action" value="insert">
                    <!-- Hall Information Section -->
                    <div class="hall-section">
                        <h5>Hall Information</h5>

                        <div class="row mb-2">
                            <label for="hallName" class="col-sm-4 col-form-label">Hall Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hallName" name="hall_name" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="hallPhone" class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hallPhone" name="hall_phone" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="hallAddress" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hallAddress" name="hall_address" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="hallRent" class="col-sm-4 col-form-label">Rent</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="hallRent" name="hall_rent" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="hallSize" class="col-sm-4 col-form-label">Size (sq ft)</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="hallSize" name="hall_size" required>
                            </div>
                        </div>
                    </div>

                    <!-- Manager Information Section -->
                    <div class="manager-section">
                        <h5>Manager Information</h5>

                        <div class="row mb-2">
                            <label for="managerName" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="managerName" name="manager_name" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="managerPhone" class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="managerPhone" name="manager_phone" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="managerEmail" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="managerEmail" name="manager_email" required>
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