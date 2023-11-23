<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Purchase Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Purchase Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Purchase Order Form -->
            <div class="card card-primary">
                <div class="card-header p-3 mb-2 bg-white text-dark">
                    <div class="card-title" style="margin-top:5px;">Purchase Order Data
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#outerModal" style="float: right; ">New Purchase Order + </button>
                </div>
                <div class="card-body">

                <table id="example2" class="table table-bordered table-hover" style="width:100">
                <thead>
                    <tr>
                        <th>Po Number</th>
                        <th>PO Date</th>
                        <th>Kode Department</th>
                        <th>Shipment Location</th>
                        <th>Shipment Terms</th>
                        <th>Person In Charge</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tpoheader as $item) {?>
                    <tr>
                        <td><?php echo $item->PoNumber;?></td>
                        <td><?php echo $item->PoDate; ?></td>
                        <td><?php echo $item->KodeDept; ?></td>
                        <td><?php echo $item->ShipmentLoc; ?></td>
                        <td><?php echo $item->ShipmentTerms; ?></td>
                        <td><?php echo $item->PersonInCharge; ?></td>
                        <td>

                        
                        <button class="btn btn-info dropdown-items" type="button" data-toggle="modal" data-target="#viewModal_<?php echo $item->PoNumber; ?>" style="float: right; margin-left:5px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                            <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                            <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                        </svg>    
                            View
                        </button>

                            <div class="modal fade" id="viewModal_<?php echo $item->PoNumber; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewModalTitle<?php echo $item->PoNumber; ?>">View Record <?php echo $item->PoNumber; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Content for viewing the record -->
                                            <p>Details of record <?php echo $item->PoNumber?></p>
                                            <p>Other relevant information</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <button class="btn btn-warning dropdown-items" type="button" data-toggle="modal" data-target="#updateModal_<?php echo $item->PoNumber; ?>" style="float: right; margin-left:5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                            <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                            </svg>
                            Update
                            </button>

                            <div class="modal fade" id="updateModal_<?php echo $item->PoNumber; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalTitle<?php echo $item->PoNumber?>">Update Record <?php echo $item->PoNumber?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Content for updating the record -->
                                            <p>Update form for record <?php echo $item->PoNumber?></p>
                                            <input type="text" class="form-control" placeholder="New Data">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-danger dropdown-items" type="button" data-toggle="modal" data-target="#deleteModal_<?php echo $item->PoNumber; ?>" style="float: right; margin-left:5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                                <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293z"></path>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"></path>
                            </svg>
                            Delete
                            </button>

                            <div class="modal fade" id="deleteModal_<?php echo $item->PoNumber; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalTitle<?php echo $item->PoNumber?>">Delete Record <?php echo $item->PoNumber?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Content for deleting the record -->
                                            <p>Are you sure you want to delete record <?php echo $item->PoNumber?>?</p>
                                            <p>This action cannot be undone.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

                    <!-- Outer Modal with a Form -->
                    <div class="modal fade" id="outerModal" tabindex="-1" role="dialog" aria-labelledby="outerModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="outerModalLabel">New Purchase Order</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Order Information Form -->
                                        <div class="card">
                                            <div class="card-header text-white bg-dark">
                                                <h4>Order Information</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- insert_form.php -->
                                                <form method="post" action="<?= base_url('Add/insertData') ?>">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                                <label for="KodeDept">Department Code</label>
                                                                <input type="text" class="form-control" id="KodeDept" name="KodeDept">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="PersonInCharge">Person In Charge</label>
                                                            <input type="text" class="form-control" id="PersonInCharge" name="PersonInCharge">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="VendorNo">Vendor Number</label>
                                                            <input type="text" class="form-control" id="VendorNo" name="VendorNo">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                                <label for="ShipmentTerms">Shipment Terms</label>
                                                                <input type="text" class="form-control" id="ShipmentTerms" name="ShipmentTerms">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="ShipmentLoc">Shipment Location</label>
                                                            <input type="Text" class="form-control" id="ShipmentLoc" name="ShipmentLoc">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                                <label for="Delivery">Expected Delivery</label>
                                                                <input type="text" class="form-control" id="Delivery" name="Delivery">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="KodeProd">Production Code</label>
                                                            <input type="Text" class="form-control" id="KodeProd" name="KodeProd">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="kodebudget">Budget Code</label>
                                                            <input type="Text" class="form-control" id="kodebudget" name="kodebudget">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="card">
                                        <div class="card-header text-white bg-dark">
                                            <h4>Order Detail</h4>
                                        </div>
                                        <div class="card-body">
                                            <!-- insert_form.php -->
                                            <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Items</label>
                                        </div>
                                        <!-- Assuming $tbarang is an array of items -->
                                            <div>
                                                <select class="custom-select item-selector" id="selectedItems_" onchange="addTableRow(this)">
                                                <option selected disabled>Choose...</option>
                                                <?php foreach ($tbarang as $item) { ?>
                                                    <option value="<?php echo $item->item_code . '|' . $item->item_name . '|' . $item->price . '|' . $item->category; ?>">
                                                        <?php echo $item->item_name ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                            <table class="table table-bordered table-hover" id="itemTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Item Code</th>
                                                        <th scope="col">Item Name</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Category</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tableBody">
                                                    <!-- Table rows will be dynamically added here -->
                                                </tbody>
                                            </table>
                                        <script>
                                            function addTableRow(selectElement) {
                                                var selectedValue = selectElement.value;
                                                if (selectedValue) {
                                                    var values = selectedValue.split('|');
                                                    var itemCode = values[0];
                                                    var itemName = values[1];
                                                    var Price = values[2];
                                                    var Category = values[3];

                                                    var tableBody = document.getElementById('tableBody');
                                                    var newRow = tableBody.insertRow();
                                                    var cell1 = newRow.insertCell(0);
                                                    var cell2 = newRow.insertCell(1);
                                                    var cell3 = newRow.insertCell(2);
                                                    var cell4 = newRow.insertCell(3);
                                                        cell1.innerHTML = '<input type="text" name="selectedItems[]" value="' + itemCode + '" readonly>';
                                                        cell2.innerHTML = values[1];
                                                        cell3.innerHTML = values[2];
                                                        cell4.innerHTML = values[3];

                                                // Add a delete button to the new row
                                                    var deleteButton = document.createElement("button");
                                                    deleteButton.className = "btn btn-danger";
                                                    deleteButton.innerHTML = "Delete";
                                                    deleteButton.onclick = function () {
                                                        deleteRow(newRow);
                                                    };
                                                    newRow.appendChild(deleteButton);
                                                }
                                            }

                                            function deleteRow(row) {
                                                var tableBody = document.getElementById('tableBody');
                                                tableBody.removeChild(row);
                                            }
                                        </script>
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="margin-bottom:20px; margin-top:20px;">Transaction Detail</button>
                                                    <div class="collapse" id="collapseExample">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="kodebudget">Budget Code</label>
                                                                <input type="Text" class="form-control" id="kodebudget" name="kodebudget">
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                                <button type="submit" class="btn btn-primary" value="create">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        // Open the outer modal
                        $('#outerModal').modal('show');
                    </script>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
            <!-- End Purchase Order Form -->
        </div>
    </section>