  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Current Items</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="1">Home</a></li>
              <li class="breadcrumb-item active">Available Items</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card" style="margin-top: 15px;">
              <div class="card-header">
                <h3 class="card-title">Pre Order Status</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $value) { ?>
                <tr>
                    <td><?php echo $value['item_code']?></td>
                    <td><?php echo $value['item_name']?></td>
                    <td><?php echo $value['unit']?></td>
                    <td><?php echo $value['price']?></td>
                    <td><?php echo $value['harga']?></td>
                    <td><?php echo $value['weight']?></td>
                    <td><?php echo $value['category']?></td>
                    <td><?php echo $value['subcategory']?></td>
                    <td><?php echo $value['brand']?></td>
                </tr>
                
            <?php } ?>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    
    