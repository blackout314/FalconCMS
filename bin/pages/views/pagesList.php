
<ul>
<?php

if( count($this->_PAGES)>0 )
foreach( $this->_PAGES as $p ):
	echo '<li><a href="?p=/pages/'.$p.'">'.$p.'</a></li>';
endforeach;

?>
</ul>
