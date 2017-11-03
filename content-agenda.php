<?php query_posts('category_name=Agendas&order=DESC'); while (have_posts()) : the_post(); ?>

<!-- Begin the Table -->			
<table id="myTable-<?php echo the_field('type'); ?>" class="rows">
<thead>
  <tr>
   <th><?php echo the_field('type'); ?></th><th>Date</th><th>Agenda</th><th>Meeting</th>
  </tr>
</thead>
<tbody>
<tr>
<td><?php the_title( '<span>', '<span>' ); ?></td>
<td><?php $date = strtotime(get_field('meeting_date', $post->ID)); ?><span><?php echo date('M d, Y', $date); ?></span</td>
<td><button type="button" data-toggle="modal" data-target="#myModal-<?php $content = the_field('agenda_id', $post->ID); ?>" class="wpcf7-form-control wpcf7-submit">View Agenda</button></td>
<td><button type="button" data-toggle="modal" data-target="#myModal-<?php $content = the_field('meeting_date', $post->ID); ?>" class="wpcf7-form-control wpcf7-submit">View Meeting</button></td>
</tr>
</tbody></table><br>
<!-- End the Table -->

 <!-- Begin Agenda Modal -->
<div class="modal" id="myModal-<?php $content = the_field('agenda_id', $post->ID); ?>">
  <!-- Agenda Modal content -->
  <div class="modal-content">
    <span class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
    <iframe class="uyd-embedded" src="https://docs.google.com/file/d/<?php $content = the_field('agenda_id', $post->ID); ?>/preview?rm=minimal" width="100%" height="500" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
  </div>
<!-- Agenda Modal content -->
</div> <!-- End Modal -->

 <!-- Begin Meeting Modal -->
<div class="modal" id="myModal-<?php $content = the_field('meeting_date', $post->ID); ?>">
  <!-- Meeting Modal content -->
  <div class="modal-content">
    <span class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
		
<iframe class="uyd-embedded" style="display: inline-block; padding-top: inherit; padding-right: 10px;" src="https://www.youtube.com/embed/<?php $content = the_field('youtube_video_id', $post->ID); ?>" name="video-<?php $content = the_field('youtube_video_id', $post->ID); ?>" width="40%" height="380" frameborder="0" scrolling="no" align="left" allowfullscreen="allowfullscreen"></iframe>

<iframe class="uyd-embedded" style="display: inline-block; float: inherit;" src="https://docs.google.com/file/d/<?php $content = the_field('agenda_id', $post->ID); ?>/preview?rm=minimal" width="60%" height="500" frameborder="0" scrolling="no" align="right" allowfullscreen="allowfullscreen"></iframe><br>
<h3>Index</h3>
<ul>
 	<li><a href="https://www.youtube.com/embed/<?php $content = the_field('youtube_video_id', $post->ID); ?>?start=30&amp;autoplay=1" target="video-<?php $content = the_field('youtube_video_id', $post->ID); ?>">30s</a> This is a concept.</li>
</ul>
  </div>
<!-- Meeting Modal content -->
</div> <!-- End Modal -->
            <?php /* It loops derp */ endwhile; wp_reset_query(); ?>
