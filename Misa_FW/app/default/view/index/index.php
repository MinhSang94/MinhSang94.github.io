<h1><?=$this->message?></h1>
<a href="<?=$this->website?>"><?=$this->getTitle()?></a><br/>
<?php foreach ($this->models as $item) :?>
	<?=$item->user_name?><br/>
<?php endforeach; ?>