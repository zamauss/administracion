<table class="table table-bordered table-striped">
	<tr>
		<?php
		$count=0;
		foreach($this->tableSchema->columns as $column)
		{
			if($column->isPrimaryKey)
			{
				echo "<td class='span2'>\n\t\t\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?></b>\n\t\t</td>\n";
				continue;
			}
			if(++$count==7)
				echo "\t\t<?php /*\n";
			echo "\t\t<td >\n\t\t\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?></b>\n\t\t</td>\n";
		}
		if($count>=7)
			echo "\t\t*/ ?>\n";
			
		?>
	</tr>