<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Mappr Demo</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>
      body {font-family: 'Open Sans', Arial, sans-serif;font-size:13px;}
      h4 {font-size: 18px;color:#000;}
    </style>
    <script src="<?= base_url() ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCWa6gbmERVfGBHVR09_Xx3rtgIWYNDWdw&libraries=places"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionic Icons -->
    <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
  </head>

  <body>
    <div id="mappr" class="mappr-container">
    <style>
    #mappr * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    #mappr {width:100%;max-width:100%;}
    .mappr-left, .mappr-right {height: 600px;max-height:600px;overflow-y: auto;border-bottom: 3px solid #d8d8d8;}
    .mappr-left {width: 70%;float: left;padding:10px;}
    .mappr-right {width: 70%;float: right;}
    .mappr-bottom{
      width:100%;
      float:left;
    }
    .mappr-name {font-size: 18px;margin: 0 0 8px 0;font-weight:600;color:#000;}
    .result-left {width: 30%;float: left;padding:10px;}
    .result-right {width: 30%;float: right;padding:10px;}
    .result-top{
      width:100%;
      float:left;
    }
    #mappr-results {padding: 0;margin:0;font-size: 13px;}
    #mappr-results li {transition: all 0.3s ease;list-style-type:none;position: relative;padding: 24px 16px;border-bottom: 1px solid #d8d8d8;}
    #mappr-results li:hover {background-color: #ececec;}
    li.mappr-selected,li.mappr-selected:hover {background-color: #d8d8d8;}
    #mappr-results p {margin: 0 0 8px 0;}
    #mappr-results a,.mappr-results a:active,.mappr-results a:visited {color: #1976D2;text-decoration: none;}
    #mappr-results a:hover {text-decoration: underline;}
    .mappr-distance {position: absolute;top:27px;right:30px;}
    .mappr-search {position: relative;width:74%;float: left;}
    .mappr-search input {border:1px solid #d8d8d8;height: 45px;line-height:40px;font-size:13px;width:100%;border-radius: 5px;color:#000;padding: 0 16px;}
    #mappr-filter-button {color:#000;text-decoration: none;border: 1px solid #d8d8d8;text-align: center;height: 45px;line-height:42px;border-radius: 5px;margin-left: 2%;width:24%;float: right;}
    #mappr-filter-content {box-sizing: border-box;width:100%;border: 1px solid #d8d8d8;padding:8px 16px; margin:8px 0;border-radius: 5px;}
    #mappr-filter-content label {display: block;color: #000;text-decoration: none;margin: 6px 0px; font-weight:normal;}
    #mappr-filter-content label:hover {cursor:pointer;}
    .mappr-links a {margin-right: 20px;}
    #mappr-radius {margin: 8px 16px;}
    #mappr-radius select {border-radius: 5px; border: 1px solid #d8d8d8;}
    #mappr ::-webkit-scrollbar {width: 8px;}
    #mappr ::-webkit-scrollbar-track {background: #f1f1f1;}
    #mappr ::-webkit-scrollbar-thumb {background: #888;}
    #mappr ::-webkit-scrollbar-thumb:hover {background: #555;}
    #mappr-search-button {display: block;width: 18px;height:18px;background-image: url('<?= base_url();?>public/dist/img/search-icon.png');background-size: contain;position: absolute;top:13px;right:16px;}
    input[type=checkbox], input[type=radio] {margin: 4px 6px 0}
    </style>
    <div class="mappr-left" id="results">
      <div class="mappr-search"><input type="text" id="mappr-address" placeholder="Enter zip or address"><a href="#" id="mappr-search-button"></a></div>
      <a href="javascript:void(0);" id="mappr-filter-button">Filter</a>
      <br clear="all" />
      <div id="mappr-filter-content" style="display: none;">
         <!--  <label><input type="checkbox" name="mappr_filter[]" class="custom_category" value="Google WiFi"> Google WiFi</a></label>
          <label><input type="checkbox" name="mappr_filter[]" class="custom_category" value="Open 24 hours per day"> Open 24 hours per day</label>
          <label><input type="checkbox" name="mappr_filter[]" class="custom_category" value="Drive-Thru"> Drive-Thru</label> -->
      </div>
      <div id="mappr-radius">Search Radius:
        <select>
          <option value="5">5 mi</option>
          <option value="25" selected>25 mi</option>
          <option value="50">50 mi</option>
          <option value="150">150 mi</option>
          <option value="250">250 mi</option>
        </select>
      </div>
      <ul id="mappr-results"></ul>
    </div>
    <div class="mappr-right" id="map-canvas"></div>
  </div>
  </body>
  <script src="<?= base_url() ?>public/dist/js/main.js"></script>

</html>
