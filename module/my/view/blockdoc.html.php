<div class='panel panel-block dynamic'>
  <div class='panel-heading'>
    <?php echo html::icon($lang->icons['dynamic']);?> <strong><?php echo $lang->my->home->doc;?></strong>
    <div class="panel-actions pull-right">
	<?php common::printLink('doc', 'browse', 'libID='.$config->doc->libID.'&module='.$config->doc->module, $lang->more . "<span class='icon-more'></span>");?></div>
  </div>
<table class='table table-condensed table-hover table-striped table-borderless table-fixed'>
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
		echo $user;
	}
    
	$pubDoc->actionLabel='';
	if($pubDoc->type=='item')
	{
		$pubDoc->objectLabel="<B>$pubDoc->objectLabel</B>";
	}
	
    printf("<i>%s</i> <a href='%s'>%s</a>", $pubDoc->actionLabel, $pubDoc->objectLink, $pubDoc->objectName);
    echo "</td><td class='divider'></td></tr>";
 
	$cDoc++;
	if($cDoc==17)break;
  }
 ?>
</table>
</div>
