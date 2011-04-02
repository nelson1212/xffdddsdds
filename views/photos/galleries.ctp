<div class="photos form">
	<ul> 
 <?php foreach($sets['photoset'] AS $item): ?> 
 Titulo del album: <?php echo $this->Html->link($item['title'], array('action' => 'upload', $item['id'])); ?> 
 <?php echo $item['description']; ?><br>
 <?php endforeach; ?> 
</ul>

<br>
<ul id="thumbs"> 
 <?php //debug($thumbs); 
 foreach($thumbs['photoset']['photo'] as $item): ?> 
 <a href="<?php echo $flickr->buildPhotoURL($item, "medium")?>" title="<?php echo $item['title']?>" rel="lightbox[]"><img  
       src="<?php echo $flickr->buildPhotoURL($item, "thumbnail")?>"  
       alt="<?php echo $item['title']?>" /></a><br><br>
 <? endforeach; ?> 
</ul>
<br>
<br>
<?php echo $this->Form->create('Photo', array('type'=>'file'));?>
	<?php __('Subir fotos'); ?>
		<?php
			echo $this->Form->input('file', array('type'=>'file'));
		?>
		<button>Upload</button>
		 <div>Upload files</div>
		
	<?php echo $this->Form->end();?>
	</fieldset>
	<table id="files"></table>
	<?php echo $this->Javascript->link('upload.js');?>
</div>