<?php

ob_implicit_flush(true);
ob_end_flush();

echo 'Start processing...';
flush();

sleep(1); // Simulando algum processo demorado

echo 'Step 1 complete...';
flush();

sleep(1);

echo 'Final step complete!';
flush();
?>
