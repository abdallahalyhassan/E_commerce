<?php
include "includes/nav.php";
include "includes/sidebar.php";
?>
  
  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Statistics Cards -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>
                <p>Total Products</p>
              </div>
              <div class="icon">
                <i class="fas fa-box"></i>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>530</h3>
                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
            </div>

          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>530</h3>
                <p>most ordered product</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>120</h3>
                <p>New Customers</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Latest Products Table -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Latest Products</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Date Added</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Product 1</td>
                  <td>$10</td>
                  <td>2025-03-08</td>
                </tr>
                <tr>
                  <td>Product 2</td>
                  <td>$15</td>
                  <td>2025-03-08</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>