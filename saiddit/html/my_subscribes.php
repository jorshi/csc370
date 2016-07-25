<?php

function printSubscribeDropdown($subscribes) {
?>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MY SUBSAIDDITS<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <?php 
                foreach ($subscribes as &$subscribe) {
                    echo '<li><a href="homepage.php?s='.$subscribe.'">'.strtoupper($subscribe).'</a></li>';
                }
            ?>
        </ul>
    </li>
<?php
}
?>
