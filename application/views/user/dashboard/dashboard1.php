<!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp; Store List</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('store'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Store</a>
          <a href="<?= base_url('user/dashboard/export_csv'); ?>" class="btn btn-success">Export as CSV</a>
        </div>
        
      </div>
    </div>
  </div>

   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Your store database</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      
      <a href="#" value="Delete Selected"  class="btn btn-danger" id="delete_selected"><i class="fa fa-remove"></i> Delete Selected</a>
      <br/>
      <br/>
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th><input type="checkbox" id="checkAll"></th>
          <th>Name#</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Email</th>
		      <th>URL</th>
		      <th>Lat</th>
		      <th>Lng</th>
          <th class="text-right">Action</th>
        </tr
        </thead>
        <tbody>
        <?php foreach($stores as $data): ?>
          <tr>
            <td><input type="checkbox" name="stores" value="<?= $data['id']; ?>"></td>
            <td><?= $data['store_name']; ?></td>
            <td><?= $data['store_address']; ?></td>
			      <td><?= $data['store_phone']; ?></td>
            <td><?= $data['store_email']; ?></td>
            <td><?= $data['store_url']; ?></td>
            <td><?= $data['store_lat']; ?></td>
            <td><?= $data['store_lng']; ?></td>
            <td><div class="btn-group pull-right">
              <a href="<?= base_url('store/edit/'.$data['id']); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
              <a href="<?= base_url('store/delete/'.$data['id']); ?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
            </div></td>
		      </tr>
        <?php endforeach; ?>
        </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable(
        {
          "columns": [
            { "width": "2%" },
            null,
            { "width": "10%" },
            null,
            null,
            null,
            null,
            null,
            null
          ]
        }
    );

    $('#checkAll').click(function () {    
       $('input:checkbox').prop('checked', this.checked);    
    });

    $('#delete_selected').click(function(){
        var store_ids = [];

        $('input[name="stores"]:checked').each(function() {
          store_ids.push(this.value);
        });

        $.ajax({
          url:'<?= base_url("store/delete_selected"); ?>',
          method: 'post',
          data: {store_ids : store_ids},
          dataType: 'json',
          success: function(response){
            jQuery('input:checkbox:checked').parents("tr").remove();
            location.reload();
          }
        });
      
    });

  });
</script> 
<script>
  $("#user_dashboard").addClass('active');
  $("#user_dashboard1").addClass('active');
</script>        
