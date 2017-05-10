<h3 style="font-weight: bold;text-align: center;"><?php echo $detail['title']; ?></h3><hr>
<p><?php echo $detail['content'] ?></p>
<?php
if (isset($detail['imageArr']) && count($detail['imageArr'])!=0) {
	foreach ($detail['imageArr'] as $imageArr) {
		echo "<img style='max-width:200px;' src='$imageArr[url]'>";
	}
}
?>