  <footer class="footer">
    <div class="container">
      <div class="footer__inner">
        <div class="footer__logo">
          <div class="logo">
            <a class="logo__link" href="<?php echo home_url(); ?>">
              <svg class="logo__svg">
                <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-logoWhite"></use>
              </svg>
              <p class="logo__text"><?php bloginfo('description'); ?></p>
            </a>
          </div>
        </div>
        <div class="address">
          <a class="address__link" href="tel:<?php the_field('mobile_phone_number', 6); ?>">
            <?php the_field('mobile_phone', 6); ?>
          </a>
          <a class="address__link" href="tel:<?php the_field('mobile_phone_2', 6); ?>">
            <?php the_field('mobile_phone_number_2', 6); ?>
          </a>
        </div>
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'header-soc',
            'menu_class'      => 'socials',
            'container' => NULL
          )
        );
      ?>
        <!-- <ul class="socials">
          <li class="socials__item">
            <a class="socials__link" href="<?php the_field('linkedin_link'); ?>" target="_blanc">
              <svg class="socials__icon" width="12" height="11">
                <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-linkedin"></use>
              </svg>
            </a>
          </li>
          <li class="socials__item">
            <a class="socials__link" href="<?php the_field('telegramm_link'); ?>" target="_blanc">
              <svg class="socials__icon" width="14" height="13">
                <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-telegramm"></use>
              </svg>
            </a>
          </li>
          <li class="socials__item">
            <a class="socials__link" href="<?php the_field('m_link'); ?>" target="_blanc">
              <svg class="socials__icon" width="15" height="12">
                <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-m"> </use>
              </svg>
            </a>
          </li>
        </ul> -->
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  </body>

  </html>