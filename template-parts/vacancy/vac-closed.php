<li class="position">
  <div class="position__head">
    <h3 class="position__title">
      <a href="#">
        <?php the_title(); ?>
      </a>
    </h3>
    <div class="status">closed</div>
    <div class="position__time"><span id="daysAgo">13</span>days ago</div>
    <div class="position__logo">
      <img src="<?php bloginfo('template_url'); ?> . /assets/images/logo/logo-short.png" alt="short-logo">
    </div>
  </div>
  <div class="position__therms">
    <div class="position__therm"><?php the_field('payment'); ?></div>
    <div class="position__therm">
      <svg class="vacancy__box-icon" width="16" height="20">
        <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-location"></use>
      </svg>Cyprus
    </div>
  </div>
  <div class="position__income"><?php the_field('amount'); ?></div>
  <div class="position__footer">
    <div class="position__text"><?php the_field('position_description'); ?><a class="position__more" href="#">...more</a></div>
    <div class="position__mobile">
      <div class="status">closed</div>
      <div class="position__time"><span id="daysAgo">13</span>days ago</div>
      <div class="position__logo">
        <img src="<?php the_field('short_logo'); ?>" alt="short-logo">
      </div>
    </div>
    <label class="position__customCheckbox" for="buyer">
      <input class="position__input" type="checkbox" id="buyer" disabled><span></span>
    </label>
    <button class="button button--position" type="button" disabled>reply</button>
  </div>
</li>