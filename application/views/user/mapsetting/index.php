<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCWa6gbmERVfGBHVR09_Xx3rtgIWYNDWdw&libraries=places"></script>

 <!-- Main content -->
    <section class="content">
      <h2>Map Settings</h2>
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <?php echo form_open(base_url('mapsetting/save'), 'class="form-horizontal"' )?>
          <div class="row">
            <div class="col-md-6">
              <!-- general form elements -->
                <div class="box-body">

                  <div class="form-group">
                    <h4>Map Type</h4>
                    <div class="radio">
                      <label>
                        <input type="radio" name="map_options" id="map_options1" value="gmap" <?= ($map_settings['map_options'] == 'gmap'? 'checked="checked"': '');?>>
                        Google Map
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="map_options" id="map_options2" value="mapbox" <?= ($map_settings['map_options'] == 'mapbox'? 'checked="checked"': '');?>>
                        MapBox
                      </label>
                    </div>

                  </div>

                  <div class="form-group">
                    <label class="text required control-label" for="map_api_key"><abbr title="required">*</abbr> Enter API Key</label>
                    <input type="text" class="form-control" id="map_api_key" name="map_api_key" value="<?=  $map_settings['map_api_key']; ?>" placeholder="">
                  </div>

                  <div class="form-group">
                    <h4>Map Layout</h4>
                    <div class="radio">
                      <label>
                        <input type="radio" name="map_layout" id="map_layout1" value="0" <?= ($map_settings['map_layout'] == 0? 'checked="checked"': '');?>>
                        Map on Top / Results on Bottom
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="map_layout" id="map_layout2" value="1" <?= ($map_settings['map_layout'] == 1? 'checked="checked"': '');?>>
                        Results Left / Map Right
                      </label>
                    </div>

                    <div class="radio">
                      <label>
                        <input type="radio" name="map_layout" id="map_layout3" value="2" <?= ($map_settings['map_layout'] == 2? 'checked="checked"': '');?>>
                        Results Right / Map Left
                      </label>
                    </div>

                  </div>

                  <div class="form-group">
                    <h4>Make Location visible on initial load </h4>
                    <div class="radio">
                      <label>
                        <input type="radio" name="location_visible" id="location_visible1" value="1" <?= ($map_settings['location_visible'] == 1? 'checked="checked"': '');?>>
                        Yes
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="location_visible" id="location_visible2" value="0" <?= ($map_settings['location_visible'] == 0? 'checked="checked"': '');?>>
                        No
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <h4>Ask for users location</h4>
                    <p>This option will enable geolocation. Users will be asked to specify their location so that they can see results nearest them.</p>
                    <div class="radio">
                      <label>
                        <input type="radio" name="ask_user_location" id="ask_user_location1" value="1" <?= ($map_settings['ask_user_location'] == 1? 'checked="checked"': '');?>>
                        Yes
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="ask_user_location" id="ask_user_location2" value="0" <?= ($map_settings['ask_user_location'] == 0? 'checked="checked"': '');?>>
                        No
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <h4>Custom CSS</h4>
                    <p>Customize the look and feel of your store locator by using custom CSS. This feature is for advanced users only.</p>
                    <label class="text control-label" for="custom_css">Custom CSS rules</label>
                    <textarea  class="form-control" rows="4" id="custom_css" name="custom_css" placeholder=""><?=  $map_settings['custom_css']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label class="text control-label" for="external_csslink">Link to an external CSS file</label>
                    <input type="text" class="form-control" id="external_csslink" name="external_csslink" value="<?=  $map_settings['external_csslink']; ?>" placeholder="">
                  </div>

                  <div class="form-group">
                    <label>Google Fonts</label>
                    <select class="form-control" name="google_fonts">
                      <option value="Karla" <?= ($map_settings['google_fonts'] == 'Karla')? 'selected="selected"': '';?>>Karla</option>
                      <option value="Lora" <?= ($map_settings['google_fonts'] == 'Lora')? 'selected="selected"': '';?>>Lora</option>
                      <option value="Frank+Ruhl+Libre" <?= ($map_settings['google_fonts'] == 'Frank+Ruhl+Libre')? 'selected="selected"': '';?>>Frank Ruhl Libre</option>
                      <option value="Playfair+Display" <?= ($map_settings['google_fonts'] == 'Playfair+Display')? 'selected="selected"': '';?>>Playfair Display</option>
                      <option value="Archivo" <?= ($map_settings['google_fonts'] == 'Archivo')? 'selected="selected"': '';?>>Archivo</option>
                      <option value="Spectral" <?= ($map_settings['google_fonts'] == 'Spectral')? 'selected="selected"': '';?>>Spectral</option>
                      <option value="Fjalla+One" <?= ($map_settings['google_fonts'] == 'Fjalla+One')? 'selected="selected"': '';?>>Fjalla One</option>
                      <option value="Roboto" <?= ($map_settings['google_fonts'] == 'Roboto')? 'selected="selected"': '';?>>Roboto</option>
                      <option value="Montserrat" <?= ($map_settings['google_fonts'] == 'Montserrat')? 'selected="selected"': '';?>>Montserrat</option>
                      <option value="Rubik" <?= ($map_settings['google_fonts'] == 'Rubik')? 'selected="selected"': '';?>>Rubik</option>
                      <option value="Source+Sans" <?= ($map_settings['google_fonts'] == 'Source+Sans')? 'selected="selected"': '';?>>Source Sans</option>
                      <option value="Cardo" <?= ($map_settings['google_fonts'] == 'Cardo')? 'selected="selected"': '';?>>Cardo</option>
                      <option value="Cormorant" <?= ($map_settings['google_fonts'] == 'Cormorant')? 'selected="selected"': '';?>>Cormorant</option>
                      <option value="Work+Sans" <?= ($map_settings['google_fonts'] == 'Work+Sans')? 'selected="selected"': '';?>>Work Sans</option>
                      <option value="Rakkas" <?= ($map_settings['google_fonts'] == 'Rakkas')? 'selected="selected"': '';?>>Rakkas</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="text control-label" for="custom_image_marker">Custom image for markers</label>
                    <input type="text" class="form-control" id="custom_image_marker" value="<?=  $map_settings['custom_image_marker']; ?>"  name="custom_image_marker" placeholder="">
                  </div>

                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="box-body">
                <div class="form-group">
                  <label class="text control-label" for="starting_location">Starting Location(ZipCode)</label>
                  <input type="text" class="form-control" id="starting_location" value="<?=  $map_settings['starting_location']; ?>"  name="starting_location" onblur="getLatLngByZipcode()" placeholder="">
                  <input type="hidden" name="start_lat" id="start_lat" value="<?= $map_settings['start_lat']; ?>">
                  <input type="hidden" name="start_lng" id="start_lng" value="<?= $map_settings['start_lng']; ?>">
                </div>

                <div class="form-group">
                  <label class="text control-label" for="starting_zoomlevel">Starting Zoom Level</label>
                  <input type="text" class="form-control " id="starting_zoomlevel" value="<?=  $map_settings['starting_zoomlevel']; ?>" name="starting_zoomlevel" placeholder="">
                </div>

                <div class="form-group">
                  <label class="text control-label" for="after_zoomlevel">Zoom Level After Search</label>
                  <input type="text" class="form-control " id="after_zoomlevel" value="<?=  $map_settings['after_zoomlevel']; ?>" name="after_zoomlevel" placeholder="">
                </div>

                <div class="form-group">
                  <h4>Show search radius filter</h4>
                  <div class="radio">
                    <label>
                      <input type="radio" name="search_radius_filter" id="search_radius_filter1" value="1" <?= ($map_settings['search_radius_filter'] == 1? 'checked="checked"': '');?>>
                      Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="search_radius_filter" id="search_radius_filter0" value="0" <?= ($map_settings['search_radius_filter'] == 0? 'checked="checked"': '');?>>
                      No
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="text control-label" for="default_search_radius">Default search radius</label>
                  <input type="text" class="form-control " id="default_search_radius" name="default_search_radius" value="<?=  $map_settings['default_search_radius']; ?>" placeholder="">
                </div>

                <div class="form-group">
                  <h4>Show store nearest to query location</h4>
                  <div class="radio">
                    <label>
                      <input type="radio" name="show_store_nearest" id="show_store_nearest1" value="1" <?= ($map_settings['show_store_nearest'] == 1? 'checked="checked"': '');?>>
                      Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="show_store_nearest" id="show_store_nearest0" value="0" <?= ($map_settings['show_store_nearest'] == 0? 'checked="checked"': '');?>>
                      No
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <h4>Enable Autocomplete on search</h4>
                  <div class="radio">
                    <label>
                      <input type="radio" name="enable_autocomplete" id="enable_autocomplete1" value="1" <?= ($map_settings['enable_autocomplete'] == 1? 'checked="checked"': '');?>>
                      Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="enable_autocomplete" id="enable_autocomplete0" value="0" <?= ($map_settings['enable_autocomplete'] == 0? 'checked="checked"': '');?>>
                      No
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label>Search Location Layout</label>
                  <select class="form-control" name="search_location">
                    <option value="horizontal" <?= ($map_settings['search_location'] == 'horizontal')? 'selected="selected"': '';?>>Horizontal</option>
                    <option value="vertical" <?= ($map_settings['search_location'] == 'vertical')? 'selected="selected"': '';?>>Vertical</option>
                    <option value="search_on_top" <?= ($map_settings['search_location'] == 'search_on_top')? 'selected="selected"': '';?>>Search On Top</option>
                  </select>
                </div>

                <div class="form-group">
                  <h4>Filters</h4>
                  <p>You can set custom categories, tags or filters so users can narrow down locations. Use commas to create multiple filters.</p>
                  <label class="text control-label" for="custom_categories">Define Filters</label>
                  <input type="text" class="form-control " id="custom_categories" name="custom_categories" value="<?=  $map_settings['custom_categories']; ?>" placeholder="optional (exmaple: free wifi, bitcoin accepted, apple pay)">
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

  function getLatLngByZipcode() {
      var geocoder = new google.maps.Geocoder();
      var address = $('#starting_location').val();
      var latitude = 0.0;
      var longitude = 0.0;
      geocoder.geocode({ 'address': address }, function (results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
              latitude = results[0].geometry.location.lat();
              longitude = results[0].geometry.location.lng();
              $('#start_lat').val(latitude);
              $('#start_lng').val(longitude);
          } else {
              $('#start_lat').val(0);
              $('#start_lng').val(0);
          }
      });

  }

  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });

</script>
<script>
  $("#map_setting").addClass('active');
  $("#map_setting_details").addClass('active');
</script>
