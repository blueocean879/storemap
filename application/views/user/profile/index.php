<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4>Profile</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('profile/change_pwd'); ?>" class="btn btn-primary">Change Password</a>
        </div>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
            <?php echo form_open(base_url('profile'), 'class="form-horizontal"' )?>
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">User Name</label>

                <div class="col-sm-9">
                  <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" id="username" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">First Name</label>

                <div class="col-sm-9">
                  <input type="text" name="firstname" value="<?= $user['firstname']; ?>" class="form-control" id="firstname" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Last Name</label>

                <div class="col-sm-9">
                  <input type="text" name="lastname" value="<?= $user['lastname']; ?>" class="form-control" id="lastname" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-9">
                  <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" id="email" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Mobile No</label>

                <div class="col-sm-9">
                  <input type="number" name="mobile_no" value="<?= $user['mobile_no']; ?>" class="form-control" id="mobile_no" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="billing_email" class="col-sm-2 control-label">Billing Email</label>

                <div class="col-sm-9">
                  <input type="email" name="billing_email" value="<?= $user['billing_email']; ?>" class="form-control" id="billing_email" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="company_name" class="col-sm-2 control-label">Company Name</label>

                <div class="col-sm-9">
                  <input type="text" name="company_name" value="<?= $user['company_name']; ?>" class="form-control" id="company_name" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="company_address" class="col-sm-2 control-label">Company Address</label>

                <div class="col-sm-9">
                  <input type="text" name="company_address" value="<?= $user['company_address']; ?>" class="form-control" id="company_address" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update Profile" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>

</section>



 <script>
    $("#profile").addClass('active');
  </script>
