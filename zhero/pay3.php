<?php
    class TestObject {
	        }
    @unlink("phar.phar"); 
    $phar = new Phar("phar.phar"); //The suffix name must be phar
    $phar=startBuffering(); 
        $phar=setStub("<?php __HALT_COMPILER( ); ?>"); //Set stub 
	    $o = new TestObject(); 
	    $phar=setMetadata($o); //Save custom meta-data to manifest 
	        $phar=addFromString("test. txt", "test"); //Add the file to be compressed 
	        //Signature is automatically calculated 
	    $phar=stopBuffering();
?>
