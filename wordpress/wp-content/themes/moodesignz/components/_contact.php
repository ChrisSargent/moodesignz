<?php
  $phone = get_field('contact_telephone', 'option');
  $fax = get_field('contact_fax', 'option');
  $email = get_field('contact_email', 'option');
?>

<dl class="moo-contact__details">
  <?php if($phone) : ?>
    <dt class="moo-contact__phone">Phone</dt>
    <dd><a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></dd>
  <?php endif;
    if($fax) : ?>
    <dt class="moo-contact__fax">Fax</dt>
    <dd><a href="tel:<?php echo $fax ?>"><?php echo $fax ?></a></dd>
  <?php endif;
    if($email) : ?>
    <dt class="moo-contact__email">Email</dt>
    <dd><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></dd>
  <?php endif; ?>
</dl>
