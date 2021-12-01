<?php
/** @var string $currentPage*/
/** @var $genres*/

foreach ($genres as ['CODE'=> $code, 'NAME'=>$name]): ?>
	<div class = "menu-item">
		<a class = "menu-item-link<?= $currentPage === $code ? "-active" : ""?>" href = "<?='index.php?genre='.$code?>"><?=$name?></a></div>
<?php endforeach;?>
