@extends('layouts.app')

@section('content')
<div class="container">
  <div class="jumbotron">
    <p>The premise is simple. Input the phone number (country code first), put a prank message, click and pay $1 USD. The intended phone number will receive a prank call with the alloted message.</p>
  </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Send A Prank Call</div>

                <div class="panel-body">
                  <form role="form" action="/make-call" method="post">
                  <div class="form-group">
                    {{ csrf_field() }}
                   <input type="tel" class="form-control" id="phone" placeholder="+18594024863" name="phone" required>
                  </div>
                  <div class="form-group">

                   <input type="text" maxlength="5000" class="form-control" placeholder="Prank Message" name="message" id="message" required>
                  </div>

                  <script
                  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                  data-key="{{env('STRIPE_PUBLIC')}}"
                  data-amount="100"
                  data-name="https://prankforadollar.com"
                  data-description="Prank Call"
                  data-image="https://en.gravatar.com/userimage/70717632/53adbdecac04d4ffbe3449993c901a73.jpeg"
                  data-locale="auto"
                  data-alipay="true"
                  data-bitcoin="true"
                  data-label="Pay And Prank!">
                </script>
                  </form>
                </div>
            </div>
        </div>
    </div>
    <h6>By using this app you agree with the <a href="/terms">terms and conditions</a> associated with the app.</h6>
</div>
@endsection
