<?php include "includes/nav.php"; ?>
<?php include "includes/sidebar.php"; ?>

<div class="content-wrapper">
    <div class="container-fluid mt-5">
        <div class="card shadow p-4">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Stock</th>
                        <th>Price ($)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>
                                <img src="https://via.placeholder.com/80" alt="Product Image" class="img-thumbnail" style="width: 80px; height: 80px;">
                            </td>
                            <td>Product <?= $i ?></td>
                            <td>Category <?= $i ?></td>
                            <td>Sample description for product <?= $i ?>.</td>
                            <td><?= rand(1, 100) ?></td>
                            <td>$<?= number_format(rand(10, 100), 2) ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $i ?>">Delete</button>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteModal<?= $i ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete <strong>Product <?= $i ?></strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
