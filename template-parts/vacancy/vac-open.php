<li class="position">
  <!-- <pre>
     <?php
                // $url = the_permalink();
                // var_dump($url); 
      $time_diff = human_time_diff(get_post_time('U')); //  выводит 5 дней
     
      //> Опубликовано 5 лет назад.
      ?> 
 </pre> -->

  <div class="position__head">
    <h3 class="position__title">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h3>
    <div class="status status--open">open</div>

    <div class="position__time"><span id="daysAgo">
        
        <pre><?=  $time_diff; ?></pre>
      
      </span>days ago</div>
    <div class="position__logo">
      <img src="<?php bloginfo('template_url'); ?> . /assets/images/logo/logo-short.png" alt="short-logo">
    </div>
  </div>
  <div class="position__therms">
    <div class="position__therm"><?php the_field('payment'); ?></div>
    <div class="position__therm">
      <svg width="16" height="20">
        <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-location"></use>
      </svg>Cyprus
    </div>
  </div>
  <div class="position__income"><?php the_field('amount'); ?></div>
  <div class="position__footer">
    <div class="position__text"><?php the_field('position_description'); ?><a class="position__more" href="<?php the_permalink(); ?>">...more</a></div>
    <div class="position__mobile">

      <div class="status status--open">open</div>

      <div class="position__time"><span id="daysAgo">12</span>days ago</div>

      <div class="position__logo">
        <img src="<?php the_field('short_logo'); ?>" alt="short-logo">
      </div>

    </div>
    <label class="position__customCheckbox" for="analyst">
      <input class="position__input" type="checkbox" id="analyst"><span></span>
    </label>
    <a class="button button--position" href="<?php the_permalink(); ?>">reply</a>
  </div>
</li>