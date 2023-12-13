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
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Purchase Orders</h3>
		<div class="card-tools">
			<a href="/add/manage" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
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
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
								  	<a class="dropdown-item" href="?page=purchase_orders/view_po&id="><span class="fa fa-eye text-primary"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item" href="?page=purchase_orders/manage_po&id="><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id=""><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
						<?php }?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this rent permanently?","delete_rent",[$(this).attr('data-id')])
		})
		$('.view_details').click(function(){
			uni_modal("Reservaton Details","purchase_orders/view_details.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.renew_data').click(function(){
			_conf("Are you sure to renew this rent data?","renew_rent",[$(this).attr('data-id')]);
		})
		$('.table th,.table td').addClass('px-1 py-0 align-middle')
		$('.table').dataTable();
	})
	function delete_rent($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_rent",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
	function renew_rent($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=renew_rent",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>
</div>
</section>