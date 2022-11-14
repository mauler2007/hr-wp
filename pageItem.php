  <?php

  /**
   * Template Name: pageItem
   */

  // $head = get_header('home');
  // var_dump($head);

  get_header('page');
  ?>

  <main class="main">
    <?php
    while (have_posts()) :
      the_post();

      get_template_part('template-parts/sections/vacancies/vacancy', 'page');

    // If comments are open or we have at least one comment, load up the comment template.

    endwhile; // End of the loop.
    ?>
    <div class="container">
      <!-- <div class="bredcrumbs">

    </div> -->
      <div class="breadcrumbs">
        <ul class="breadcrumbs__list">
          <?php true_breadcrumbs(); ?>
        </ul>
      </div>

      <?php if (have_posts()) :

        while (have_posts()) :
          the_post();

          get_template_part('template-parts/sections/info/info');

        endwhile;

      endif;
      ?>
     
      <?php get_template_part('template-parts/sections/form/form', ''); ?>      
    </div>

  </main><!-- #main -->

  <?php

  get_footer();
