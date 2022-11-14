<section class="vacancy vacancy--page">
  <!-- <pre>
    <?php
    $data = get_post(145);
    var_dump($data);
    ?>
  </pre> -->
  <div class="vacancy__bg">
    <div class="vacancy__filter"></div>
    <div class="container">
      <div class="vacancy__inner">
        <div class="vacancy__content">
          <time class="vacancy__date">
            <svg width="18" height="18">
              <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-calendar "></use>
            </svg>
            <span>14/08/2022</span>
          </time>
          <span class="status status--open">open</span>
          <h1 class="vacancy__heading"><?php the_title(); ?></h1>
          <ul class="vacancy__box">
            <li>
              <svg class="vacancy__box-icon" width="18" height="18">
                <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-check"></use>
              </svg>
              <?php the_field('advantage_1') ?>
              <!-- socialtech -->
            </li>
            <li>
              <svg class="vacancy__box-icon" width="18" height="18">
                <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-clock"></use>
              </svg>
              <!-- full-Time -->
              <?php the_field('advantage_2') ?>
            </li>
            <li>
              <svg class="vacancy__box-icon" width="18" height="20">
                <use xlink:href="<?php bloginfo('template_url'); ?> . /assets/images/sprite.svg#icon-location"></use>
              </svg>
              <?php the_field('advantage_3') ?>
              <!-- Cyprus -->
            </li>
          </ul>
          <div class="vacancy__actions">
            <a class="button button--vacancy" href="#form">
              apply now
            </a>
            <button class="button button--vacancy" id="shareBtn" data-share="sharePosition">
              share
            </button>
          </div>
        </div>
        <div class="vacancy__wooman">
          <img class="vacancy__wooman-image" src="<?php bloginfo('template_url'); ?> . /assets/images/bg/wooman.png" alt="wooman">
        </div>
      </div>
    </div>
  </div>
  <div class="scrollDown">
    <a class="scrollDown__link" href="#form">
      Read more about the vacancy
    </a>
  </div>
</section>