<?
$video_id = $_POST['s1'];
$video = @simplexml_load_file("https://gdata.youtube.com/feeds/api/videos/$video_id");
?>
<script>
window.history.pushState('object','title','play?view=play&cal=<?=$video_id?>');
</script>
<div class="Preview">
<div class="Mouse_Music_Title">Mouse Music and Video Search</div>
<iframe width="418" height="315" src="//www.youtube.com/embed/<?=$video_id ?>?autoplay=1" frameborder="0" allowfullscreen></iframe>
<div class="Preview_Title"><?=$video->title?></div>

</div>