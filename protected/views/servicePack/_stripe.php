<form action="/index.php?r=payment/payforpack" method="post">
    <input type="hidden" name="service_pack_id" value="<?php echo $model->id ?>">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description=' Оплатить пакет услуг "<?php echo $model->name ?>"'
          data-amount="<?php echo $model->price * 100 ?>"
          data-currency="<?php echo $model->valuta ?>"
          data-locale="auto"></script>
</form>