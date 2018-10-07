  
 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp; Users List (Datatable - ServerSide Processing)</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/users/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New User</a>
        </div>
        
      </div>
    </div>
  </div> 

   <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="na_datatable" class="table table-bordered table-striped" width="100%">
        <thead>
        <tr>
          <th>User Name</th>
          <th>Email</th>
          <th>Mobile No.</th>
          <th>Status</th>
          <th>Billing</th>
          <th></th>
          <th style="width: 150px;" class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($users as $user):?>
          <tr>
            <td><?= $user['username']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['mobile_no']; ?></td>
            <td><?= ($user['is_active'] == 1)? 'Active':'Deactive';?></td>
            <td><?= $user['billing_type']; ?></td>
            <td><a title="Login as user" class="view btn btn-sm btn-info" target="_blank" href="<?= base_url('admin/users/proxy/'.$user['user_id']); ?>">Login as user</a></td>
            <td>
              <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" data-href="<?= base_url('admin/users/del/'.$user['user_id']); ?>" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-o"></i></a>
              <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('admin/users/edit/'.$user['user_id']); ?>"> <i class="fa fa-pencil-square-o"></i></a>
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

<!-- Modal -->
<div id="confirm-delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
        <p>As you sure you want to delete.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div>

  </div>
</div>


  <!-- DataTables -->
  <script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable();
 /* var table = $('#na_datatable').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "<?=base_url('admin/users/datatable_json')?>",
      "order": [[0,'asc']],
      "columnDefs": [
        { "targets": 0, "name": "username", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "email", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "mobile_no", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "role", 'searchable':false, 'orderable':false},
        { "targets": 4, "name": "is_admin", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
      ]
    });*/
  </script>
  
  <script type="text/javascript">
      $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
  </script>
  

