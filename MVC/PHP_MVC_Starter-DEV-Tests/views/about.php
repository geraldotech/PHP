<h1>About Page</h1>
<?php

// 1
// string
$str = "Geraldo Costa Filho";
 print_r($str); 

 // explore to array
 $gpexplode = explode(" ", $str);

  print_r($gpexplode); 
// loop em cada item para o h2
  foreach($gpexplode as $i => $val){
    print_r("<h1>{$val}</h1>"); 
  }


// 2
// array implode to string
echo '<hr>'; 
$list = ['Alpha', 'Bravo', 'Charhlie'];

$listim = implode($list);
echo $listim; 


// loop list 
foreach($list as $ind => $row){
     print_r("<p>{$row} - {$ind}</p>");  
}
