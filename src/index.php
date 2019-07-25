<?php

echo date('h:i:s') . "\n";
sleep(2);
echo date('h:i:s') . "\n";

$headers = getallheaders();
foreach($headers as $key=>$val){
  echo $key . ': ' . $val . '<br>';
}
echo gethostname();
?>
<br/>
