<?php


Yii::import('zii.widgets.CListView');

class CCustomListView extends CListView
{
	public $itemView;
	public $headersview;
	public $footersview;
	public $headerContentView;
	public $footerContentView;
	
	public function renderItems()
	{
		echo CHtml::openTag($this->itemsTagName,array('class'=>$this->itemsCssClass))."\n";
		$data=$this->dataProvider->getData();
		if(($n=count($data))>0)
		{
			$owner=$this->getOwner();
			$render=$owner instanceof CController ? 'renderPartial' : 'render';
			$j=0;
			$bandera = true;
			foreach($data as $i=>$item)
			{				
				$data=$this->viewData;
				$data['index']=$i;
				$data['data']=$item;
				$data['widget']=$this;
				if ($bandera == true){
					$owner->$render($this->headersview,$data);
					$bandera = false;
				}
				$owner->$render($this->itemView,$data);
				if($j++ < $n-1)
					echo $this->separator;
			}
			$owner->$render($this->footersview,$data);
		}
		else
			$this->renderEmptyText();
		echo CHtml::closeTag($this->itemsTagName);
	}

	public function renderHeaderContent()
	{
		if($this->headerContentView === null)
			throw new CException(Yii::t('zii','The property "headerContentView" cannot be empty.'));
		
		$owner=$this->getOwner();
		$owner->$render($this->headerContentView);
	}
	
	public function renderFooterContent()
	{
		if($this->footerContentView === null)
			throw new CException(Yii::t('zii','The property "footerContentView" cannot be empty.'));
		
		$owner=$this->getOwner();
		$owner->$render($this->footerContentView);
	}
}

?>