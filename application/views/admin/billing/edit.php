<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Billing Cost</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
            <?php echo form_open(base_url('admin/billing/save'), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="billing_cost" class="col-sm-2 control-label"><?= $billing['billing_type']; ?> Cost</label>
                <div class="col-sm-6">
                  <input type="text" name="billing_cost" value="<?= $billing['billing_cost']; ?>" class="form-control" id="billing_cost">
                  <input type="hidden" name="id" value="<?= $billing['id']; ?>">
                </div>
              </div>
              <br/>
              <br/>
              <div class="form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-10">
                  <input type="submit" name="submit" value="Update" class="btn btn-info">
                </div>
              </div>
            <?php  echo form_close(); ?>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
  </div>  

</section> 

<script>
  $("#billings").addClass('active');
  $("#billing_option").addClass('active');
</script> 