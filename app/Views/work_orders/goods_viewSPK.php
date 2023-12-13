<!-- Content Wrapper. Contains page content -->
<div class="content pt-3" style="min-height: 296.4px; background-color:#c6c6c6;">
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
                <table id="goodsView" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Sub Category</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tbarang as $value) { ?>
                <tr>
                    <td><?php echo $value['item_code']?></td>
                    <td><?php echo $value['item_name']?></td>
                    <td><?php echo $value['unit']?></td>
                    <td><?php echo $value['price']?></td>
                    <td><?php echo $value['subcategory']?></td>
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
    
    