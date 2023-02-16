<?= $this->extend('student/default_layout') ?>

<?= $this->section('content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dashboard <small> Response</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">


                <div class="col-md-8 center-margin">
                  

                        <?php if (session()->getFlashdata('errors')) { ?>
                            <div class="alert alert-danger col-md-12" role="alert">
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                    <i class="fa fa-times"></i> <?= esc($error) ?>
                                    <br>
                                <?php endforeach; ?>
                            </div>
                        <?php } elseif (session()->getFlashdata('success')) { ?>
                            <div class="alert alert-success col-md-12" role="alert">
                                <i class="fa fa-check"></i> <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php } ?>


                        <button class="btn btn-primary btn-lg " onclick="payWithPaystack()"> Pay Acceptance Fee </button>


                </div>



            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<script>
       // var paymentForm = document.getElementById('paymentForm');
//paymentForm.addEventListener('submit', payWithPaystack, false);
function payWithPaystack() {
    
  var handler = PaystackPop.setup({
    key: 'pk_live_18c729d5801ddd4d3df3b98d736a6f190a6219d3', // Replace with your public key
    email: '<?= $payment_details->email ?>',
    amount: 5000 * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
    currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
    ref: '<?= $payment_details->payment_reference ?>', // Replace with a reference you generated
    callback: function(response) {
      //this happens after the payment is completed successfully
      var reference = response.reference;
      alert('Payment complete! Reference: ' + reference);
	  window.location.replace("<?= base_url('payAcceptance/'.$payment_details->applicant) ?>");
      // Make an AJAX call to your server with the reference to verify the transaction
    },
    onClose: function() {
      alert('Transaction was not completed, window closed.');
    },
  });
  handler.openIframe();
}
</script>

<script src="https://js.paystack.co/v1/inline.js"></script> 

<?= $this->endSection() ?>