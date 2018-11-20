 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

 <section class="content">
   <h1>Billing</h1>
  <div class="box col-md-12 billing-box">
    <div class="col-md-5">
        <div class="col-md-7">
      <span class="subheading">Your Plan</span>
      <h3>Advanced Monthly</h3>
      <p>Save 10% annually by switching to an annual plan.</p>
      <div class="form-group" data-role="content">
                  <label for="plan">Change Plan</label>
                  <select class="form-control col-xs-3" name="plan" id="plan">
                    <option class="active" value="advanced-monthly">Advanced Monthly - $57/mo</option>
                    <option value="pro-monthly">Pro Monthly - $27/mo</option>
                    <option value="micro-monthly">Micro Monthly - $17/mo</option>
                    <option disabled>_________</option>
                    <option value="advanced-annual">Advanced Annual - $612 ($51/mo)</option>
                    <option value="pro-annual">Pro Annual - $288 ($24/mo)</option>
                    <option value="micro-annual">Micro Annual - $180 ($15/mo)</option>
                  </select>
      </div>
      <hr class="divider"></hr>
      <span class="subheading">Payment Method</span>
      <p class="card-name">Gene Maryushenko</p>
      <p class="card-number">**** **** **** 8049</p>
      <div>
        <a class="btn change-card btn-default" role="button" data-toggle="collapse" href="#changeCard" aria-expanded="false" aria-controls="changeCard">Change Card</a>
        <div class="collapse" id="changeCard">
        <form class="update-card">
          <span class="subheading">New Card Information</span>
          <div class="form-group">
            <label for="creditCardNumber">Credit Card Number</label>
            <input type="number" class="form-control" id="creditCardNumber" name="ccNumber" placeholder="">
          </div>
          <div class="form-group form-inline">
            <label for="expiry-month">Expiration Date</label>
            <select name="expiry-month" id="expirty-month" class="form-control">
              <option value="1">1 - January</option>
              <option value="2">2 - February</option>
              <option value="3">3 - March</option>
              <option value="4">4- April</option>
              <option value="5">5 - May</option>
              <option value="6">6 - June</option>
              <option value="7">7 - July</option>
              <option value="8">8 - August</option>
              <option value="9">9 - September</option>
              <option value="10">10 - October</option>
              <option value="11">11 - November</option>
              <option value="12">12 - December </option>
            </select>
            <label for="expiry-year"</label>
              <select name="expiry-year" id="expirty-year" class="form-control">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
              </select>
          </div>
          <div class="form-group">
            <label for="cvv">Security Code on Back (CVV)</label>
            <input class="form-control span60" id="cvv" name="cvvNumber" placeholder="">
          </div>

        </form>
        </div>
      </div>
      <button class="btn update-account btn-primary">Update Account</button>
      <div class="cancellation">
        <p>Have a question? <a href="mailto:hello@getmappr.com" target="_blank">Email us for help</a></p>
        <small><a href="#cancel">Cancel Your Account</a></small>
      </div>
      <hr class="divider"></hr>
      <span class="subheading">Invoice History</span>
      <table class="table table-bordred">
        <tr>
          <td>October 20, 2018</td>
          <td>$57.00</td>
          <td><a href="#">PDF</a></td>
        </tr>
        <tr>
          <td>September 20, 2018</td>
          <td>$57.00</td>
          <td><a href="#">PDF</a></td>
        </tr>
        <tr>
          <td>March 20, 2018</td>
          <td>$57.00</td>
          <td><a href="#">PDF</a></td>
        </tr>
        <tr>
          <td>February 20, 2018</td>
          <td>$57.00</td>
          <td><a href="#">PDF</a></td>
        </tr>
        <tr>
          <td>January 20, 2018</td>
          <td>$57.00</td>
          <td><a href="#">PDF</a></td>
        </tr>
        <tr>
          <td>December 20, 2017</td>
          <td>$57.00</td>
          <td><a href="#">PDF</a></td>
        </tr>
        <tr>
          <td><small><a href="#">Show all invoices</a></small></td>
          <td></td>
        </tr>
      </table>

    </div>
    </div>
    <div class="col-md-7">
      <div class="alert alert-primary">
            <h4>Free Trial Active - <span class="trial-countdown">7</span> Days Remaining</h4>
            You are currently in the 14-day free trial period. After 14 days, you will start on the Monthly Advanced plan, but you are welcome to change this to anything you like.
      </div>
      <!-- Start Plan Tabs -->

      <ul class="nav nav-pills">
    <li role="presentation" class="active">
      <a href="#pills-monthly" aria-controls="pills-monthly" role="tab" data-toggle="tab">Monthly</a>
    </li>
    <li role="presentation">
      <a href="#pills-annual" aria-controls="pills-annual" role="tab" data-toggle="tab">Annual (Save 10%)</a>
    </li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="pills-monthly" role="tabpanel">
      <!-- Start Monthly Table -->
      <table class="table table-bordered billing-pricing-table table-center" style="text-align:center;">
        <tbody>
          <tr>
            <th>Micro</th>
            <th>Pro</th>
            <th>Advanced <br><span class="badge badge-primary">Most Popular</span></th>
          </tr>
          <tr>
            <td><span class="plan-price">$17/mo</span><small>Paid Monthly</small></td>
            <td><span class="plan-price">$27/mo</span><small>Paid Monthly</small></td>
            <td><span class="plan-price">$57/mo</span><small>Paid Monthly</small></td>
          </tr>
          <tr>
            <td>Bulk Uploads & Exporting</td>
            <td>Bulk Uploads & Exporting</td>
            <td>Bulk Uploads & Exporting</td>
          </tr>
          <tr>
            <td>Unlimited Traffic</td>
            <td>Unlimited Traffic</td>
            <td>Unlimited Traffic</td>
          </tr>
          <tr>
            <td>Up to 100 Locations</td>
            <td>Up to 1000 Locations</td>
            <td>Unlimited Locations</td>
          </tr>
          <tr>
            <td>Standard Map Styles</td>
            <td>Standard + Custom Map Styles (soon)</td>
            <td>Standard + Custom Map Styles (soon)</td>
          </tr>
          <tr>
            <td>Standard Support</td>
            <td>Standard Support</td>
            <td>Expendited Support</td>
          </tr>
          <tr>
            <td class="feature-disabled">Custom Landing Pages (soon)</td>
            <td>Custom Landing Pages (soon)</td>
            <td>Custom Landing Pages (soon)</td>
          </tr>
          <tr>
            <td class="feature-disabled">Google Drive Syncing (soon)</td>
            <td class="feature-disabled">Google Drive Syncing (soon)</td>
            <td>Google Drive Syncing (soon)</td>
          </tr>
          <tr>
            <td class="feature-disabled">White Label</td>
            <td class="feature-disabled">White Label</td>
            <td>White Label</td>
          </tr>
          <tr data-role="controlgroup">
            <td><a data-role="button" data-val="micro-monthly" id="btnMicroMonthly" class="btn btn-default select-change">Select</a></td>
            <td><a data-role="button" data-val="pro-monthly" id="btnProMonthly" class="btn btn-default select-change">Select</a></td>
            <td><a data-role="button" data-val="advanced-monthly" id="btnAdvancedMonthly" class="btn btn-default select-change">Select</a></td>
          </tr>
        </tbody>
      </table>
      <!-- End Monthly Table -->
    </div>
    <div class="tab-pane" id="pills-annual" role="tabpanel">
      <table class="table table-bordered billing-pricing-table table-center" style="text-align:center;">
        <tbody>
          <tr>
            <th>Micro</th>
            <th>Pro</th>
            <th>Advanced <br><span class="badge badge-primary">Most Popular</span></th>
          </tr>
          <tr>
            <td><span class="plan-price">$15/mo</span><small>Paid Annually ($180)</small></td>
            <td><span class="plan-price">$24/mo</span><small>Paid Annually ($288)</small></td>
            <td><span class="plan-price">$51/mo</span><small>Paid Annually ($612)</small></td>
          </tr>
          <tr>
            <td>Bulk Uploads & Exporting</td>
            <td>Bulk Uploads & Exporting</td>
            <td>Bulk Uploads & Exporting</td>
          </tr>
          <tr>
            <td>Unlimited Traffic</td>
            <td>Unlimited Traffic</td>
            <td>Unlimited Traffic</td>
          </tr>
          <tr>
            <td>Up to 100 Locations</td>
            <td>Up to 1000 Locations</td>
            <td>Unlimited Locations</td>
          </tr>
          <tr>
            <td>Standard Map Styles</td>
            <td>Standard + Custom Map Styles (soon)</td>
            <td>Standard + Custom Map Styles (soon)</td>
          </tr>
          <tr>
            <td>Standard Support</td>
            <td>Standard Support</td>
            <td>Expendited Support</td>
          </tr>
          <tr>
            <td class="feature-disabled">Custom Landing Pages (soon)</td>
            <td>Custom Landing Pages (soon)</td>
            <td>Custom Landing Pages (soon)</td>
          </tr>
          <tr>
            <td class="feature-disabled">Google Drive Syncing (soon)</td>
            <td class="feature-disabled">Google Drive Syncing (soon)</td>
            <td>Google Drive Syncing (soon)</td>
          </tr>
          <tr>
            <td class="feature-disabled">White Label</td>
            <td class="feature-disabled">White Label</td>
            <td>White Label</td>
          </tr>
          <tr data-role="controlgroup">
            <td><a data-role="button" data-val="micro-annual" id="btnMicroAnnual" class="btn btn-default select-change">Select</a></td>
            <td><a data-role="button" data-val="pro-annual" id="btnProAnnual" class="btn btn-default select-change">Select</a></td>
            <td><a data-role="button" data-val="advanced-annual" id="btnAdvancedAnnual" class="btn btn-default select-change">Select</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    </div>
  </div>
  <!-- /.box -->
</section>

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

<script>
  $("#payment").addClass('active');
  $("#billing").addClass('active');
</script>

<script>
$('.select-change').click(function(){
    $('#plan').val($(this).data('val')).trigger('change');
})
</script>
