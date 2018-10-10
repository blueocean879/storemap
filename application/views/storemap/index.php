<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Mappr Demo</title>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC7v5tPcwo4wXY1mU3PUtXpcxReRcrjsXE&libraries=places"></script>

    <style>
      body {font-family: 'Open Sans', Arial, sans-serif;font-size:13px;}
      h4 {font-size: 18px;color:#000;}
    </style>
  </head>

  <body>
  <div class="container" style="width: 1400px;margin:0 auto;">

  <div id="mappr" class="mappr-container">
  <style>
  #mappr * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  #mappr {width:100%;max-width:100%;}
  .mappr-left, .mappr-right {height: 600px;max-height:600px;overflow-y: scroll;border-bottom: 3px solid #d8d8d8;}
  .result-left {width: 30%;float: left;padding:10px;}
  .result-right {width: 30%;float: right;padding:10px;}
  .mappr-right {width: 70%;float: left;}
  .mappr-left {width: 70%;float: right;}
  .mappr-name {font-size: 18px;margin: 0 0 5px 0;font-weight:600;color:#000;}
  .mappr-results {padding: 0;margin:0;font-size: 13px;}
  .mappr-results li {transition: all 0.3s ease;list-style-type:none;position: relative;padding: 22px 30px;border-bottom: 1px solid #d8d8d8;}
  .mappr-results li:hover {background-color: #ececec;}
  li.mappr-selected,li.mappr-selected:hover {background-color: #d8d8d8;}
  .mappr-results p {margin: 0 0 6px 0;}
  .mappr-results a {color: #1976D2;text-decoration: none;}
  .mappr-results a:hover {text-decoration: underline;}
  .mappr-distance {position: absolute;top:27px;right:30px;}
  .mappr-search input {border:1px solid #d8d8d8;height: 45px;line-height:40px;font-size:13px;border-radius: 5px;color:#000;width:74%;float: left;padding: 0px 15px;}
  .mappr-filter-button {border: 1px solid #d8d8d8;text-align: center;height: 45px;line-height:42px;border-radius: 5px;margin-left: 2%;width:24%;float: right;}
  .mappr-filter-content {width:100%;border: 1px solid #d8d8d8;padding: 20px 30px;margin: 10px 0px;border-radius: 5px;}
  .mappr-filter-content label {display: block;color: #000;text-decoration: none;margin: 6px 0px;}

  </style>
  <div class="result-left" id="results">
    <div class="mappr-search"><input type="text" id="mappr-address" placeholder="Enter zip or address"></div>
    <div class="mappr-filter-button">Filter</div>
    <br clear="all" />
    <div class="mappr-filter-content">
        <label><input type="checkbox" name="mappr-filter-1" value="Google WiFi"> Google WiFi</a></label>
        <label><input type="checkbox" name="mappr-filter-2" value="Open 24 hours per day"> Open 24 hours per day</label>
        <label><input type="checkbox" name="mappr-filter-3" value="Drive-Thru"> Drive-Thru</label>
    </div>
    <ul class="mappr-results" >
     <!--  <li>
        <h4 class="mappr-name">Starbucks #1</h4>
        <p class="mappr-location">
        4924 Kingston Pike<br>
        Knoxville, TN 37919</p>
        <p class="mappr-phone"><a href="tel:888-123-5566">888-123-5566</a></p>
        <p class="mappr-hours">Monday-Friday 9AM-6PM</p>
        <span class="mappr-distance">5.6 mi</span>
      </li> -->

     <!--  <li class="mappr-selected">
      <h4 class="mappr-name">Starbucks #1</h4>
      <p class="mappr-location">
      4924 Kingston Pike<br>
      Knoxville, TN 37919</p>
      <p class="mappr-phone"><a href="tel:888-123-5566">888-123-5566</a></p>
      <p class="mappr-hours">Monday-Friday 9AM-6PM</p>
      <span class="mappr-distance">5.6 mi</span>
      </li> -->
<!-- 
      <li>
      <h4 class="mappr-name">Starbucks #1</h4>
      <p class="mappr-location">
      4924 Kingston Pike<br>
      Knoxville, TN 37919</p>
      <p class="mappr-phone"><a href="tel:888-123-5566">888-123-5566</a></p>
      <p class="mappr-hours">Monday-Friday 9AM-6PM</p>
      <span class="mappr-distance">5.6 mi</span>
      </li> -->

     <!--  <li>
      <h4 class="mappr-name">Starbucks #1</h4>
      <p class="mappr-location">
      4924 Kingston Pike<br>
      Knoxville, TN 37919</p>
      <p class="mappr-phone"><a href="tel:888-123-5566">888-123-5566</a></p>
      <p class="mappr-hours">Monday-Friday 9AM-6PM</p>
      <span class="mappr-distance">5.6 mi</span>
      </li>

      <li>
      <h4 class="mappr-name">Starbucks #1</h4>
      <p class="mappr-location">
      4924 Kingston Pike<br>
      Knoxville, TN 37919</p>
      <p class="mappr-phone"><a href="tel:888-123-5566">888-123-5566</a></p>
      <p class="mappr-hours">Monday-Friday 9AM-6PM</p>
      <span class="mappr-distance">5.6 mi</span>
      </li> -->
    </ul>
  </div>
  <div class="mappr-right" id="map-canvas">
  </div>

  </div>
  <script src="<?= base_url() ?>public/dist/js/main.js"></script> 
  </body>
</html>
