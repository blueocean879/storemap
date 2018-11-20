<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Wed Nov 07 2018 10:35:29 GMT+0000 (UTC)  -->
<html data-wf-page="5bc1fee45b2ebf1ecb51d87d" data-wf-site="5bc1ccb9ac42912cf8d89921">
<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <meta content="Sign Up" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/mappr.webflow.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
  <style>
  /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  background-color: white;
  height: 40px;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
  width:100%;
  margin-bottom:8px;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
 label {opacity:0.5;}
.agree-checkbox {
    font-size: 48px;
    float: left;
    margin-top: 2px;
  	margin-right:8px;
  }
  .agree-terms {margin:16px 0;}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
</head>
<body class="body">
  <div class="hero">
    <div class="container">
      <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav"><a href="index.html" id="w-node-237123a9c40d-23a9c40c" class="brand w-nav-brand"><img src="images/mappr-logo1x.svg" alt=""></a>
        <nav role="navigation" id="w-node-237123a9c40f-23a9c40c" class="nav-menu w-nav-menu"><a href="#" class="nav-link-2 w-nav-link">Integrations</a><a href="#" class="nav-link w-nav-link">Features</a><a href="#" class="nav-link-5 w-nav-link">Pricing</a><a href="#" class="nav-link-5 w-nav-link">Demo</a><a href="#" class="nav-link-5 w-nav-link">Contact</a><a href="#" class="nav-link-5 w-nav-link">Log In</a><a href="sign-up.html" class="nav-link-5 active w-nav-link w--current">Sign Up</a></nav>
        <div id="w-node-237123a9c41e-23a9c40c" class="menu-button w-nav-button">
          <div class="w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-signup">
    <div class="container">
      <div class="w-row">
        <div class="column-2 w-col w-col-6">
          <h1 class="signup-title">Create Your Account</h1>
          <div class="signup-form-container">
            <div class="w-embed w-script">
              <script src="https://js.stripe.com/v3/"></script>
              <form action="/charge" method="post" id="payment-form">
                <div class="form-row">
                  <label for="email">
      Email
    </label>
                  <input type="email" class="StripeElement" required="">
                </div>
                <div class="form-row">
                  <label for="password">
      Password
    </label>
                  <input type="password" class="StripeElement" required="">
                </div>
                <div class="form-row">
                  <label for="confirm-password">
      Confirm Password
    </label>
                  <input type="password" class="StripeElement" required="">
                </div>
                <div class="form-row">
                  <label for="plan">
   Select your plan
   </label>

                </div>
                <div class="form-row">
                  <label for="card-element">
        Credit or debit card
      </label>
                  <div id="card-element">
                    <!--  A Stripe Element will be inserted here.  -->
                  </div>
                  <!--  Used to display form errors.  -->
                  <div id="card-errors" role="alert"></div>
                  Your card will not be charged until the 14-day trial expires.
                </div>
                <div class="form-row agree-terms">
                  <input type="checkbox" id="agreeTerms" name="agree" value="terms" class="agree-checkbox">
                  <label for="agreeTerms">I agree to the terms &amp; Services</label>
                </div>
                <button class="submit-button w-button">Finish Sign Up</button>
              </form>
              <script>
// Create a Stripe client.
var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
</script>
            </div>
          </div>
        </div>
        <div class="column w-col w-col-6">
          <h2 class="heading-4">What happens next?</h2>
          <ul class="unordered-list next-list">
            <li class="list-item">Start your free trial with access to all features</li>
            <li class="list-item">Simply add a snippet to your site</li>
            <li class="list-item">Add some locations or import them all at once</li>
            <li class="list-item">Your card will not be charged until the 14-day trial expires</li>
            <li class="list-item">Cancel any time for any reason</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
