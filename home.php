<?php
/*
Template Name: home
*/
?>
<?= get_header(); ?>

<main class="main">
  <?=   get_template_part('template-parts/sections/vacancies/vacancy', '');
 ?>
  <div class="container">
    <section class="list" id="listSection">
      <div class="list__total">All available positions<strong><span class="totalVacancies"><!-- dynamic num --></span>vacancies</strong></div>

      <ul class="list__items">
        <?php
        global $post;

        $myposts = get_posts([
          'numberposts' => 10,
          'category'    => 3 // 4 - tagID
          // 'category-name'    => 'vacancy' // ярлык рубрики
        ]);

        if ($myposts) {
          foreach ($myposts as $post) {
            setup_postdata($post);

            $vac_status = get_post_meta($post->ID, 'status', true);
        ?>
            <?php if ($vac_status) { ?>

              <?php get_template_part('template-parts/vacancy/vac', 'open') ?>

            <?php } else { ?>

              <?php get_template_part('template-parts/vacancy/vac', 'closed') ?>

            <?php } ?>

            <!-- <li><?php the_title(); ?> - <?php the_field('payment'); ?></li> -->
            <!-- Вывод постов, функции цикла: the_title() и т.д. -->
        <?php
          }
        } else {
          // Постов не найдено
        }

        wp_reset_postdata(); // Сбрасываем $post

        ?>
      </ul>
    </section>
  </div>
</main>
</div>
<?= get_footer(); ?>