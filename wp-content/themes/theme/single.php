<?php get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <article>      
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="article-info">Posted on <?php the_time('F jS, Y'); ?> by <a href="#" rel="author"><?php the_author_posts_link(); ?></a></div>

      <p><?php echo hk_trim_content(55); // display page content limited at 55 chars ?></p>
      <a href="<?php the_permalink(); ?>" class="button">Read more</a>
      <a href="<?php comments_link(); ?>" class="button button-reversed">
      <?php comments_number('0 Comments','1 Comment','% responses'); ?>
      </a>


    
      </article>

    <?php endwhile; ?>
    <?php comments_template(); ?>
<?php get_footer(); ?>