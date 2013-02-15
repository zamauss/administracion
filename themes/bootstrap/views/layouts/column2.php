<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="appcontent">
<?php if($this->pageCaption !== '') : ?>
		<div class="page-header">
			<h1><?php echo CHtml::encode($this->pageCaption); ?> <small><?php echo CHtml::encode($this->pageDescription)?></small></h1>
		</div>
<?php endif; ?>
		<div class="row">
			<div class="span12">
				<h3>Menú<?php //echo CHtml::encode($this->sidebarCaption); ?></h3>
				<?php
					$this->widget('zii.widgets.CMenu', array(
						'items'=>$this->menu,
						'htmlOptions'=>array(
						'class'=>'nav nav-tabs',
						),
					));					
				?>
			</div>
			<div class="span12">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</div> <!-- /container -->
<?php $this->endContent(); ?>