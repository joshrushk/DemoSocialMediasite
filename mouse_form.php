<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/languages.php');
?>
<div class="Mouse_Music_Playlist">
<div id="newstar_feed">
 <? 
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/functions.php');

$mouse_search = urlencode($_GET['mouse_search']);
$w = $_GET['w'];
$a = $_GET['a'];
if($mouse_search){
      $mouse_search = ereg_replace('[[:space:]]+', '/', trim($mouse_search));
      $i = 100;
    if(!$_GET['p']) $_GET['p']=1;
      $start=((intval($_GET['p'])-1)*10)+1;
      $feedURL = @file_get_contents("https://www.googleapis.com/youtube/v3/search?q=".urlencode($mouse_search)."&key=".YOUTUBE_API_KEY."&type=video&maxResults=50&part=snippet");
      $sxml = json_decode($feedURL);
      $counts = @$sxml->pageInfo;
      $total = $counts->totalResults; 
      $startOffset = $total;
      $endOffset = ($startOffset-1) + $counts->itemsPerPage;
    $i=1;
      foreach ($sxml->items as $entry) {
        $media = $entry->snippet;
        // GET Video Player Url
        $kod = $entry->id->videoId; 
        // Get Video Photo (Thumbnail)
        $thumbnail = $media->thumbnails->high->url;
		?>
<div class="musicbox" style="width: 200px;">
  <div style="height: 130px; overflow: hidden; border-radius: 2px;">
    <img src="<?=$thumbnail;?>" style="border-radius: 2px; width: 200px; margin-bottom: -6px; margin-top: -20px;">
    </div>
  <div class="musicbox-info">
      <a class="musicbox-link" href="<? echo WEBSITE_URL; ?>/play?view=play&cal=<?=$kod?>"></a>
    <a class="play_button" href="<? echo WEBSITE_URL; ?>/play?view=play&cal=<?=$kod?>"></a>                         
    <a class="musicbox-details" href="<? echo WEBSITE_URL; ?>/play?view=play&cal=<?=$kod?>" rel="nofollow">
      <span id="musicbox-title"><?=$media->title?></span>
    </a>
  </div>
</div>
<?  $i=$i+1; } } else { echo "dssd";} ?>


<?php

?>
</div>

<div id="loading-indicator">
  <img class="loader-dots" src="/themes/default/images/loader-dots.svg" />
</div>
    
</div>