<?php
//wp_enqueue_script('datatables', '//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js', array( 'jquery' ));
//wp_enqueue_style('datatables', '//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css');

?>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <input type="search" id="search" value="" class="form-control" placeholder="Search any keywords">
        </div>
    </div><br />

<!-- The Council Table -->
<?php //and awaaaaay we go
$args = array(
'category_name' => 'Agendas',
'order' => 'DESC', 
'numberposts'	=> -1, 
'post_type' => 'post', 
'meta_key' => 'type',
'meta_value' => 'council'
 );

$the_query = new WP_Query( $args ); ?>

<?php if( $the_query->have_posts() ): ?>
<table id="theTable" class="rows">
<thead>
  <tr>
  <th>City Council</th><th>Date</th><th>Agenda</th><th>Meeting</th>
  </tr>
</thead>
<tbody>
<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>


<tr>
<td><?php the_title(); ?></td>
<td><?php $date = strtotime(get_field('meeting_date', $post->ID)); echo date('M d, Y', $date); ?></td>
<td><button type="button" data-toggle="modal" data-backdrop="static" data-target="#myModal-<?php $content = the_field('agenda_id', $post->ID); ?>" class="tablebutton">View Agenda</button></td>
<td><button type="button" data-toggle="modal" data-backdrop="static" data-target="#myModal-<?php $content = the_field('meeting_date', $post->ID); ?>" class="tablebutton">View Meeting</button></td>
</tr>
<?php endwhile; ?>
</tbody></table><br>
<?php else : echo 'Bad Query'; //AIDS! ?>
<?php endif; ?>

            <?php wp_reset_query(); //Uh ohhhh! Somersoult jump! ?>
	
<!-- The Council Table -->


<!-- The PNZ Table -->
<?php
$args = array(
'category_name' => 'Agendas',
'order' => 'DESC', 
'numberposts'	=> -1, 
'post_type' => 'post', 
'meta_key' => 'type',
'meta_value' => 'pnz'
 );

$the_query = new WP_Query( $args ); ?>

<?php if( $the_query->have_posts() ): ?>
<table id="theTable" class="rows">
<thead>
  <tr>
  <th>Planning &amp; Zoning</th><th>Date</th><th>Agenda</th><th>Meeting</th>
  </tr>
</thead>
<tbody>
<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>


<tr>
<td><?php the_title(); ?></td>
<td><?php $date = strtotime(get_field('meeting_date', $post->ID)); echo date('M d, Y', $date); ?></td>
<td><button type="button" data-toggle="modal" data-backdrop="static" data-target="#myModal-<?php $content = the_field('agenda_id', $post->ID); ?>" class="tablebutton">View Agenda</button></td>
<td><button type="button" data-toggle="modal" data-backdrop="static" data-target="#myModal-<?php $content = the_field('meeting_date', $post->ID); ?>" class="tablebutton">View Meeting</button></td>
</tr>
<?php endwhile; ?>
</tbody></table><br>
<?php else : echo 'Bad Query'; //GRASSSSS... tastes bad! ?>
<?php endif; ?>

            <?php wp_reset_query(); //And that's why I always say, "Shumshumschilpiddydah!" ?>
	
<!-- The PNZ Table -->

<?php query_posts('category_name=Agendas&order=DESC'); while (have_posts()) : the_post(); 
//Rubber baby buggy bumpers!
?>		




<!-- Agenda Modal -->
<div class="modal" id="myModal-<?php $content = the_field('agenda_id', $post->ID); ?>">

  <!-- Agenda Modal content -->
  <div class="modal-content">
    <span class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
    <iframe class="uyd-embedded" src="https://docs.google.com/file/d/<?php $content = the_field('agenda_id', $post->ID); ?>/preview?rm=minimal" width="100%" height="500" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
  </div>
<!-- Agenda Modal content -->

</div><!-- Agenda Modal -->



<!-- Meeting Modal -->
<div class="modal" id="myModal-<?php $content = the_field('meeting_date', $post->ID); ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel-<?php $content = the_field('meeting_date', $post->ID); ?>" aria-hidden="true">


  <!-- Meeting Modal content -->
  <?php //Lick, lick, lick, my BALLS!
  $yturl = get_field('youtube_video_id', $post->ID);
preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $yturl, $match);
$youtube_id = $match[1]; //And that's the wayyyyyy the news goes! ?>


  <div class="modal-content">
    <span class="close" data-dismiss="modal" aria-hidden="true">&times;</span>

<div style="display: inline-block;padding-right: 10px; width:38%" id="theVideo-<?php echo $match[1]; ?>">
	
<iframe class="uyd-embedded" style="" src="https://www.youtube.com/embed/<?php echo $match[1]; ?>?rel=0&amp;enablejsapi=1" name="video-<?php echo $match[1]; ?>" width="100%" height="380" frameborder="0" scrolling="no" align="left" allowfullscreen="allowfullscreen"></iframe>

<span style="border-top: dashed #333; font-size: 20px; font-weight:700; width:100%; ">Index</span><br>
<a href="https://www.youtube.com/embed/<?php echo $match[1]; ?>?start=30&amp;autoplay=1&amp;rel=0&amp;enablejsapi=1" target="video-<?php echo $match[1]; ?>">30s</a> This is a concept.</div>


<iframe class="uyd-embedded" style="display: inline-block; float: inherit;" src="https://docs.google.com/file/d/<?php $content = the_field('agenda_id', $post->ID); ?>/preview?rm=minimal" width="60%" height="500" frameborder="0" scrolling="no" align="right" allowfullscreen="allowfullscreen"></iframe>

  </div><!-- Meeting Modal content -->
</div><!-- Meeting Modal -->

<script>
jQuery(function($) { // Rikitikitavi, bitch!
$('.close').live('click', function () {
  $('#myModal-<?php $content = the_field('meeting_date', $post->ID); ?>').hide();
  $('#theVideo-<?php echo $match[1]; ?> iframe').attr("src", jQuery("#theVideo-<?php echo $match[1]; ?> iframe").attr("src"));
})
});
</script>
<script>
jQuery(function($) {
$("#search").keyup(function () {
    var value = this.value.toLowerCase().trim();

    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});
});
</script>

            <?php 
                endwhile;
                wp_reset_query(); //Hit the sack, Jack!
            ?>
