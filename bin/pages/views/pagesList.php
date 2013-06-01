
<ul>
<?php

if( count($this->_PAGES)>0 )
foreach( $this->_PAGES as $p ):
	echo '<li>'.$p.'</li>';
endforeach;

?>
</ul>
