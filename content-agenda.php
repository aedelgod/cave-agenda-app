<?php query_posts('category_name=Agendas&order=DESC'); while (have_posts()) : the_post();

//wp_enqueue_style( 'style', 'https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' );
//wp_enqueue_script( 'script', 'https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js' );
 ?>

<!-- The Table -->			
<table id="myTable-<?php echo the_field('type'); ?>" class="rows">
<thead>
  <tr>
   <th><?php echo the_field('type'); ?></th><th>Date</th><th>Agenda</th><th>Meeting</th>
  </tr>
</thead>
<tbody>
<tr>
<td><?php the_title( '<span>', '<span>' ); ?></td>
<td><?php $date = strtotime(get_field('meeting_date', $post->ID)); echo date('M d, Y', $date); ?></td>
<td><button type="button" data-toggle="modal" data-target="#myModal-<?php $content = the_field('agenda_id', $post->ID); ?>" class="wpcf7-form-control wpcf7-submit">View Agenda</button></td>
<td><button type="button" data-toggle="modal" data-target="#myModal-<?php $content = the_field('meeting_date', $post->ID); ?>" class="wpcf7-form-control wpcf7-submit">View Meeting</button></td>
</tr>
</tbody></table><br>
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

<div style="display: inline-block;padding-right: 10px; width:38%">
	
<iframe class="uyd-embedded" style="" src="https://www.youtube.com/embed/<?php $content = the_field('youtube_video_id', $post->ID); ?>?rel=0&enablejsapi=1" name="video-<?php $content = the_field('youtube_video_id', $post->ID); ?>" width="100%" height="380" frameborder="0" scrolling="no" align="left" allowfullscreen="allowfullscreen"></iframe>
<br>
<span>Index</span><br>
<a href="https://www.youtube.com/embed/<?php $content = the_field('youtube_video_id', $post->ID); ?>?start=30&autoplay=1&rel=0&enablejsapi=1" target="video-<?php $content = the_field('youtube_video_id', $post->ID); ?>">30s</a> This is a concept.</div>


<iframe class="uyd-embedded" style="display: inline-block; float: inherit;" src="https://docs.google.com/file/d/<?php $content = the_field('agenda_id', $post->ID); ?>/preview?rm=minimal" width="60%" height="500" frameborder="0" scrolling="no" align="right" allowfullscreen="allowfullscreen"></iframe>




  </div>


<!-- Meeting Modal content -->


</div>
<script>

<!-- <script> -->
 // $(document).ready(function(){  
 //   $(".clickme").on
 //     ("click", function(){ $("#myModal-" + $(this).attr('data-id')).modal();});
 // }); 
</script> 

            <?php 
                endwhile; /* It loops derp */
                wp_reset_query(); 
            ?>
<script>
$(function(){
  $("body").on('hidden.bs.modal', function (e) {
    var $iframes = $(e.target).find("iframe");
    $iframes.each(function(index, iframe){
      $(iframe).attr("src", $(iframe).attr("src"));
    });
  });
});
</script>			
