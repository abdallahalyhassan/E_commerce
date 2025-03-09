<?php
include "includes/nav.php";
include "includes/sidebar.php";

use App\Category;
$category = new Category();
$categories = $category->GetAllCategory(); 
?>

<div class="content-wrapper">
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="row w-75 d-flex align-items-start"> 

           
            <div class="col-md-8">
                <div class="card shadow p-4">
                    <h3 class="text-center text-primary mb-3">Add New Product</h3>
                    <form action="../public/index.php?page=add-product" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Category</label>
                            <select name="category" class="form-control">
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Stock</label>
                            <input type="number" name="stock" class="form-control" min="0">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Price ($)</label>
                            <input type="number" name="price" class="form-control" min="0" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ✅ فورم إضافة الكاتيجوري -->
            <div class="col-md-4">
                <div class="card shadow p-4">
                    <h5 class="text-center text-dark mb-3">Add Category</h5>
                    <form action="../public/index.php?page=add-category" method="POST">
                        <?php errorMessage() ?>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Category Name</label>
                            <input type="text" name="category_name" class="form-control">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>

        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /content-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>