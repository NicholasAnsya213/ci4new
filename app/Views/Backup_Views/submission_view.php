  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pre Order Submission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pre Order Submission</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <!-- Pre Order Form elements -->
            <div class="card card-primary ">
              <div class="card-header p-3 mb-2 bg-white text-dark">
                <h3 class="card-title">Submission Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form style="margin:20px;">
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="inputName">Name</label>
                    <input type="Name" class="form-control" id="inputName" >
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputPOdate4">Pre Order Date</label>
                    <input type="date" class="form-control" id="inputPOdate" >
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputAddress">Pre Order Number</label>
                    <input type="text" class="form-control" id="inputAddress"  >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputName">Project</label>
                    <input type="Name" class="form-control" id="inputName" >
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputAddress2">Item Code</label>
                    <input type="text" class="form-control" id="inputAddress2" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="inputPOdate4">Departement</label>
                    <input type="text" class="form-control" id="inputPOdate" >
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputAddress">Warehouse</label>
                    <input type="text" class="form-control" id="inputAddress"  >
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputAddress2">Budget</label>
                    <input type="text" class="form-control" id="inputAddress2" >
                </div>
                </div>
                <div class="form-row" style="width: 100%;">
                    <div class="form-group col-md-3">
                    <label for="inputCity">Currency</label>
                    <input type="text" class="form-control" id="inputCity">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                    </div>
                </div>
                </form>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>PoNo</th>
                      <th>PoNumber</th>
                      <th>PoDate</th>
                      <th>VendorNo</th>
                      <th>MataUang</th>
                      <th>NilaiDalamRp</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tpoheader as $value) { ?>
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td><?php echo $value['PoNo']?></td>
                            <td><?php echo $value['PoNumber']?></td>
                            <td><?php echo $value['PoDate']?></td>
                            <td><?php echo $value['VendorNo']?></td>
                            <td><?php echo $value['MataUang']?></td>
                            <td><?php echo $value['NilaiDalamRp']?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
              </div>
            <!-- /.card -->
    </section>
 