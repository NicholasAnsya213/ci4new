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
                    <th>PO Number</th>
                    <th>PO Date</th>
                    <th>Vendor Number</th>
                    <th>Vendor Name</th>
                    <th>Mata Uang</th>
                    <th>Nilai Dalam Rupiah</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($results as $value) { ?>
                      <tr data-widget="expandable-table" aria-expanded="false">
                          <td><?php echo $value['PoNumber']?></td>
                          <td><?php echo $value['PoDate']?></td>
                          <td><?php echo $value['VendorNo']?></td>
                          <td><?php echo $value['vendorname']?></td>
                          <td><?php echo $value['MataUang']?></td>
                          <td><?php echo $value['NilaiDalamRp']?></td>
                          <td><?php echo $value['total']?></td>      
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
    