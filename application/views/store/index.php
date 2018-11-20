<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-body">
            <div class="col-md-6">
              <h4>Add Stores</h4>
            </div>
            <div class="col-md-6 text-right">
              <a href="#" class="btn btn-primary">Bulk Import</a>
            </div>

          </div>
        </div>
      </div>

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add a store</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php echo form_open(base_url('store/add_store'), array('id' => 'addStoreForm', 'class' => 'form-horizontal')); ?>
          <div class="row">
            <div class="col-md-6">
              <!-- general form elements -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="string required control-label" for="store_name"><abbr title="required">*</abbr> Title</label>
                    <input type="text" class="form-control" id="store_name" name="store_name" placeholder="">
                  </div>
                  <div class="form-group">
                    <label class="text required control-label" for="store_address"><abbr title="required">*</abbr> Address</label>
                    <input type="text" class="form-control" id="store_address" name="store_address" placeholder="">
                  </div>

                  <div class="form-group">
                    <label class="text control-label" for="store_phone"> Phone</label>
                    <input type="text" class="form-control" id="store_phone" name="store_phone" placeholder="optional">
                  </div>

                  <div class="form-group">
                    <label class="text control-label" for="store_email"> Email</label>
                    <input type="text" class="form-control" id="store_email" name="store_email" placeholder="optional">
                  </div>

                  <div class="form-group">
                    <label class="text control-label" for="store_url"> Website / URL</label>
                    <input type="text" class="form-control" id="store_url" name="store_url" placeholder="optional">
                  </div>

                  <div class="form-group">
                    <label class="text control-label" for="store_description"> Description</label>
                    <textarea class="form-control" rows="3" placeholder="optional" name="store_description"></textarea>
                  </div>

                  <div class="form-group">
                    <label>
                      <input type="checkbox" id="hide_store"> Hide Store
                      <input type="hidden" name="hide_store" id="hide_store_hidden">
                    </label>
                    <p>This will hide the store from the map in case the location is still under construction or you don't want people to see it yet.</p>
                  </div>
                  <input type="hidden" name="store_lat" id="store_lat">
                  <input type="hidden" name="store_lng" id="store_lng">
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" id="btn_addstore">Save Store</button>
                </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="box-body">

                <div class="form-group">
                  <h4>Promo Message</h4>
                  <p>Optional promo messages can help you promote sales at your locations. For example: <em>75% clearance this friday only!</em></p>
                  <label class="text control-label" for="store_promomessage"> Your promo message</label>
                  <textarea class="form-control" rows="3" placeholder="optional" name="store_promomessage"></textarea>
                </div>

                <div class="form-group">
                  <label class="text control-label" for="store_hours"> Store Hours</label>
                  <input type="text" class="form-control" id="store_hours" name="store_hours" placeholder="">
                </div>

                <div class="form-group">
                  <label class="text control-label" for="store_custom_field_1"> Custom Field 1</label>
                  <input type="text" class="form-control" id="store_custom_field_1" name="store_custom_field_1" placeholder="optional">
                </div>

                <div class="form-group">
                  <label class="text control-label" for="store_custom_field_2"> Custom Field 2</label>
                  <input type="text" class="form-control" id="store_custom_field_2" name="store_custom_field_2" placeholder="optional">
                </div>

                <div class="form-group">
                  <label class="text control-label" for="store_custom_field_3"> Custom Field 3</label>
                  <input type="text" class="form-control" id="store_custom_field_3" name="store_custom_field_3" placeholder="optional">
                </div>

                <div class="form-group">
                  <h4>Custom Marker Icon</h4>
                  <p>Optional custom marker icons. Paste the full path to your image (<em>example: https//mystore.com/images/custom-icon.png</em>) Images must be exact dimensions as you wish to see them on the map. Mappr supports PNG, JPG and SVG images.</p>
                  <label class="text control-label" for="store_custom_marker_image"> URL path to image</label>
                  <textarea class="form-control" rows="3" placeholder="optional" name="store_custom_marker_image"></textarea>
                </div>

                <div class="form-group">
                  <label class="text control-label" for="store_category"> Search Filters / Categories</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="store_category"></textarea>
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

    $("#addStoreForm").submit(function(event) {
       //disable the submit button to prevent repeated clicks
        $('#btn_addstore').attr("disabled", "disabled");

        console.log($('#store_address').val());

        var xmlHttp = new XMLHttpRequest();
        var xmlURL = "https://maps.google.com/maps/api/geocode/json?address=" + encodeURI($('#store_address').val()) + "&key=AIzaSyCWa6gbmERVfGBHVR09_Xx3rtgIWYNDWdw";
        xmlHttp.open("GET", xmlURL);
        xmlHttp.send();
        xmlHttp.addEventListener("load", function(){
            console.log(this.responseText);
            var jres = JSON.parse(this.responseText);
            var jresults = jres.results;
            if (jresults.length == 0){
                alert("There is no such address.");
                return;
            }

            $('#store_lat').val(jresults[0].geometry.location.lat);
            $('#store_lng').val(jresults[0].geometry.location.lng);

            var form$ = $("#addStoreForm");
            form$.get(0).submit();
          }
        );

        return false;
    });

  });
</script>
<script>
  $("#store").addClass('active');
  $("#new_store").addClass('active');
</script>
