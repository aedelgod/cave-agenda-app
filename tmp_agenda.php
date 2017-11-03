<?php get_header();  ?>
        <figure class="inr_page_sec">
            <div class="container">
                <div class="inr_page_container">
                    <div class="row">
<?php  while ( have_posts() ) : the_post();  get_template_part( 'template-parts/page/content', 'agenda' ); endwhile; 
  // End of the loop. Let's not be pros.
  ?>
</div> </div></div></figure>
<?php get_footer();
