<div  class='block'>
<table class='table-1 colored fixed'>
  <caption>
    <div class='f-left'><span class='icon-dynamic'></span><?php echo $lang->my->home->doc;?></div>
    <div class='f-right'><?php common::printLink('doc', 'browse', 'libID='.$config->doc->libID.'&module='.$config->doc->module, $lang->more . "<span class='icon-more'></span>");?></div>
  </caption>
  <?php 
  $cDoc=0;
  foreach($publishes as $pubDoc)
  {
    $canView = false;
    if(common::hasPriv('company', 'dynamic')) $canView = true;
    if(!$canView) continue;

	if($pubDoc->visited)
	{
		if($pubDoc->type=='item' && $pubDoc->visits<$pubDoc->items)
		{
			$user = "[<span class=red>$pubDoc->visits/$pubDoc->items</span>]";
		}
		else
			$user = '[<span class=blue>'.$pubDoc->diffViews.'</span>]';//isset($users['zentao']) ? $users['zentao'] : $pubDoc->addedBy;
		echo "<tr><td class='br' width='98%'>";
	}
	else
	{
		$user = '[<span class=red>'.$this->lang->doc->notViews.'</span>]';
		echo "<tr><td class='br warning' width='98%'>";
	}
    
	$pubDoc->actionLabel='';
	if($pubDoc->type=='item')
	{
		$pubDoc->objectLabel="<B>$pubDoc->objectLabel</B>";
	}
	
    printf($lang->my->home->actionDoc, $pubDoc->date, $pubDoc->objectLabel, $pubDoc->actionLabel,$user , $pubDoc->objectLink, $pubDoc->objectName);
    echo "</td><td class='divider'></td></tr>";
 
	$cDoc++;
	if($cDoc==17)break;
  }
 ?>
</table>
</div>
