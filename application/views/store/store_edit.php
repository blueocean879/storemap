<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">
 <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Store</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php echo form_open(base_url('store/update_store'), array('id' => 'updateStoreForm', 'class' => 'form-horizontal')); ?> 
          <div class="row">
            <div class="col-md-6">
              <!-- general form elements -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="string required control-label" for="store_name"><abbr title="required">*</abbr> Name</label>
                    <input type="text" class="form-control" value="<?= $store_detail->store_name; ?>" id="store_name" name="store_name" placeholder="Enter Store name">
                  </div>
                  <div class="form-group">
                    <label class="text required control-label" for="store_address"><abbr title="required">*</abbr> Address</label>
                    <input type="text" class="form-control" id="store_address" value="<?= $store_detail->store_address; ?>" name="store_address" placeholder="Store Address">
                  </div>

                  <div class="form-group">
                    <label class="text control-label" for="store_phone"> Phone</label>
                    <input type="text" class="form-control" id="store_phone" value="<?= $store_detail->store_phone; ?>" name="store_phone" placeholder="Store Phone">
                  </div>

                  <div class="form-group">
                    <label class="text control-label" for="store_email"> Email</label>
                    <input type="text" class="form-control" id="store_email" value="<?= $store_detail->store_email; ?>" name="store_email" placeholder="Store Email">
                  </div>

                  <div class="form-group">
                    <label class="text control-label" for="store_url"> URL</label>
                    <input type="text" class="form-control" id="store_url" value="<?= $store_detail->store_url; ?>" name="store_url" placeholder="Store URL">
                  </div>

                  <div class="form-group">
                    <label class="text control-label" for="store_description"> Description</label>
                    <textarea class="form-control" rows="3"  placeholder="Enter ..." name="store_description"><?= $store_detail->store_description; ?></textarea>
                  </div>
                   
                  <div class="form-group">
                    <label>
                      <input type="checkbox" id="hide_store" <?= (($store_detail->hide_store == 1)? 'checked': '');?>> Hide Store
                      <input type="hidden" name="hide_store" id="hide_store_hidden" value="<?= $store_detail->hide_store; ?>">
                    </label>
                  </div>
                  <input type="hidden" name="store_lat" id="store_lat" value="<?= $store_detail->store_lat; ?>">
                  <input type="hidden" name="store_lng" id="store_lng" value="<?= $store_detail->store_lng; ?>">
                  <input type="hidden" name="id" value="<?= $store_detail->id; ?>" >
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update Store</button>
                </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="box-body">

                <div class="form-group">
                  <label class="text control-label" for="store_promomessage"> Promo Message</label>
                  <textarea class="form-control" rows="3" placeholder=""  name="store_promomessage"><?= $store_detail->store_promomessage; ?></textarea>
                </div>

                <div class="form-group">
                  <label class="text control-label" for="store_custom_field_1"> Custom Field 1</label>
                  <input type="text" class="form-control" id="store_custom_field_1"  value="<?= $store_detail->store_custom_field_1; ?>" name="store_custom_field_1" placeholder="">
                </div>

                <div class="form-group">
                  <label class="text control-label" for="store_custom_field_2"> Custom Field 2</label>
                  <input type="text" class="form-control" id="store_custom_field_2" value="<?= $store_detail->store_custom_field_2; ?>" name="store_custom_field_2" placeholder="">
                </div>

                <div class="form-group">
                  <label class="text control-label" for="store_custom_field_3"> Custom Field 3</label>
                  <input type="text" class="form-control" id="store_custom_field_3" value="<?= $store_detail->store_custom_field_3; ?>" name="store_custom_field_3" placeholder="">
                </div>

                <div class="form-group">
                  <label class="text control-label" for="store_custom_marker_image"> Custom Marker Image</label>
                  <textarea class="form-control" rows="3"  placeholder="Enter ..." name="store_custom_marker_image" value="<?= $store_detail->store_custom_marker_image; ?>"></textarea>
                </div>

                <div class="form-group">
                  <label class="text control-label" for="store_category"> Search Filters / Categories</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="store_category"><?= $store_detail->store_category; ?></textarea>
                </div>
                
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
<!-- Select2 -->
<script src="<?= base_url() ?>public/plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    $('#hide_store').click(function(){
         if($(this).is(':checked')){
            $('#hide_store_hidden').val(1);
         }else{
            $('#hide_store_hidden').val(0);
         }
    });


  });
</script>
