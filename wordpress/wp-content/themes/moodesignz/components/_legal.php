<?php
  $address = get_field('address', 'option');
  $legalName = get_field('legal_name', 'option');
  $coNumber = get_field('company_registration_number', 'option');
?>

<dl class="moo-legal">
  <dt class="moo-address">Address</dt>
  <dd><?php echo $legalName; ?>, <?php echo $address; ?>.<?php if ($coNumber) {echo " Company&nbsp;Number:&nbsp;" . $coNumber;} ?></dd>
  <dt>Legal Info</dt>
  <dd>Copyright &copy; <?php $time = current_time( 'Y', $gmt = 0 ); echo $time; ?> <?php echo $legalName; ?> All Rights Reserved.</dd>
</dl>
