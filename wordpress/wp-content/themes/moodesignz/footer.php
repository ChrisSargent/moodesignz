<footer class="moo-site__footer">
  <div class="moo-site__container--wide">
    <div class="moo-site__column reorder">
      <?php	get_template_part('components/_social'); ?>
      <?php	get_template_part('components/_contact'); ?>
    </div>
    <div class="moo-site__column">
      <nav class="moo-nav--footer">
        <?php wp_nav_menu(array('theme_location' => 'footer-menu-1', 'container' => false, 'menu_id' => 'moo-nav__list--footer-1', 'menu_class' => 'moo-nav__list--footer')); ?>
        <?php wp_nav_menu(array('theme_location' => 'footer-menu-2', 'container' => false, 'menu_id' => 'moo-nav__list--footer-2', 'menu_class' => 'moo-nav__list--footer')); ?>
      </nav>
    </div>
    <?php	get_template_part('components/_accreditations'); ?>
    <?php	get_template_part('components/_legal'); ?>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
