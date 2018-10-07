  
 <section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp; Billing List</h4>
        </div>
      </div>
    </div>
  </div>

   <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>No</th>
          <th>Billing Type</th>
          <th>Cost</th>
          <th style="width: 150px;" class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php $count=0; foreach($billings as $row):?>
          <tr>
            <td><?= ++$count; ?></td>
            <td><?= $row['billing_type']; ?></td>
            <td><?= $row['billing_cost']; ?></td>
            <td>
            <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('admin/billing/edit/'.$row['id'])?>"> <i class="fa fa-pencil-square-o"></i></a>
            </td>
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
    $("#example1").DataTable({
      "paging":   false,
      "ordering": false,
      "info":     false
    });
  });
</script>
<script>
  $("#billings").addClass('active');
  $("#billing_option").addClass('active');
</script>  