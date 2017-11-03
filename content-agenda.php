            <?php  
                query_posts('category_name=Agendas&order=DESC');
                while (have_posts()) : the_post();
				
            ?>
			
<!-- The Table -->			
<table id="postTable">
<thead>
  <tr>
   <th><?php echo the_field('type'); ?></th><th>Meeting</th>
  </tr>
</thead>
<tbody>
<tr>
<td><button type="button" data-toggle="modal" data-target="#myModal-<?php $content = the_field('agenda_id', $post->ID); ?>">View Agenda</button></td>
<td><button type="button" data-toggle="modal" data-target="#myModal-<?php $content = the_field('meeting_date', $post->ID); ?>">View Meeting</button></td>
</tr>
</tbody></table>
<!-- The Table -->


<div class="modal" id="myModal-<?php $content = the_field('agenda_id', $post->ID); ?>">


  <!-- Agenda Modal content -->
  <div class="modal-content">
    <span class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
    <iframe class="uyd-embedded" src="https://docs.google.com/file/d/<?php $content = the_field('agenda_id', $post->ID); ?>/preview?rm=minimal" width="100%" height="500" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
  </div>
<!-- Agenda Modal content -->


</div>



<div class="modal" id="myModal-<?php $content = the_field('meeting_date', $post->ID); ?>">


  <!-- Meeting Modal content -->
  <div class="modal-content">
    <span class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
		
<iframe class="uyd-embedded" style="display: inline-block;" src="https://www.youtube.com/embed/<?php $content = the_field('youtube_video_id', $post->ID); ?>" name="video" width="40%" height="380" frameborder="0" scrolling="no" align="left" allowfullscreen="allowfullscreen"></iframe>

<iframe class="uyd-embedded" style="display: inline-block;" src="https://docs.google.com/file/d/<?php $content = the_field('agenda_id', $post->ID); ?>/preview?rm=minimal" width="60%" height="500" frameborder="0" scrolling="no" align="right" allowfullscreen="allowfullscreen"></iframe>
<h3>Index</h3>
<ul>
 	<li><a href="https://www.youtube.com/embed/<?php $content = the_field('youtube_video_id', $post->ID); ?>?start=80&amp;autoplay=1" target="video">1m20s</a> This is a alpha.</li>
</ul>
  </div>
<!-- Meeting Modal content -->


</div>
<script>
  $(document).ready(function(){  
    $(".clickme").on
      ("click", function(){ $("#myModal-" + $(this).attr('data-id')).modal();});
  });
</script>


            <?php 
                endwhile;
                wp_reset_query();
            ?>
