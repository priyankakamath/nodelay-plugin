<?php get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <article>      
      <h2><?php the_title(); ?></h2>
        <p><?php the_content('Read More'); ?></p>
      </article>

    <?php endwhile; ?>
<?php get_footer(); ?>