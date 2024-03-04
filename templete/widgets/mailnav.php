<div class="folder widget-shadow">
	<ul>
		<li class="head"><i class="fa fa-folder" aria-hidden="true"></i>Folders</li>
		<li><a href="mail?inbox"><i class="fa fa-inbox"></i>Inbox <?php $condition = array('type' => '1','status' => '1'); $result = rowCount('mailbox', $condition); if($result>='1') { echo '<span>'.$result.'</span>'; } ?></a></li>
		<li><a href="mail?sent"><i class="fa fa fa-envelope-o"></i>Sent <?php $condition = array('type' => '2','status' => '1'); $result = rowCount('mailbox', $condition); if($result>='1') { echo '<span>'.$result.'</span>'; } ?></a></li>
		<li><a href="mail?draft"><i class="fa fa-file-text-o"></i>Drafts <?php $condition = array('type' => '3','status' => '1'); $result = rowCount('mailbox', $condition); if($result>='1') { echo '<span>'.$result.'</span>'; } ?></a> </li>
		<li><a href="mail?spam"><i class="fa fa-flag-o"></i>Spam <?php $condition = array('type' => '4','status' => '1'); $result = rowCount('mailbox', $condition); if($result>='1') { echo '<span>'.$result.'</span>'; } ?></a></li>
		<li><a href="mail?trash"><i class="fa fa-trash-o"></i>Trash <?php $condition = array('type' => '5','status' => '1'); $result = rowCount('mailbox', $condition); if($result>='1') { echo '<span>'.$result.'</span>'; } ?></a></li>
	</ul>
</div> 