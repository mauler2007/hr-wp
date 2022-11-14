<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hr-site
 */

get_header();
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
        <li class="breadcrumbs__item"><a href="index.html#listSection">Job Openings</a></li>
        <li class="breadcrumbs__item"><span>Casino Product Manager </span></li>
      </ul>
    </div>
    <?php if (have_posts()) :

      while (have_posts()) :
        the_post();

        get_template_part('template-parts/sections/info/info');

      endwhile;

    endif;
    ?>

  </div>

</main><!-- #main -->

<?php

get_footer();
