<?php namespace ProcessWire;
$mail = new WireMail();
$mail->to('foo@bar.com');
$mail->from('bar@foo.com');
dump($mail);
