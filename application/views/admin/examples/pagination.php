 
 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp; User List with Pagination Example</h4>
        </div>
        <div class="col-md-6 text-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url('admin/example/create_users_pdf') ?>" class="btn btn-success">Export as PDF</a>
            <a href="<?= base_url('admin/example/export_csv') ?>" class="btn btn-success">Export as CSV</a>
          </div>
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
          <th>Username</th>
          <th>Email</th>
          <th>Mobile No.</th>
          <th>Group/Role</th>
		      <th>Status</th>
          
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_users as $row): ?>
          <tr>
            <td><?= $row['username']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['mobile_no']; ?></td>
            <td><span class="btn btn-info btn-flat btn-xs"><?= getGroupyName($row['role']) ?><span></td>
			      <td><span class="btn btn-success btn-flat btn-xs"><?= ($row['is_active'] == 0)?'Inactive': 'Active' ?><span></td>
            
		  </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
      <br>
      <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
      </div>
    </div>

    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  
  
<script>
$("#view_users").addClass('active');
</script>        
