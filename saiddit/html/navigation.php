<?php

function printNavigation($conn, $dir, $user) {
    include_once ($dir."db_utils/subsaiddit_factory.php");
    include_once ($dir."db_utils/subscribes_factory.php");
    include_once ($dir."html/my_subscribes.php");

    $subsaiddits = getFrontPage($conn);
    if ($user != NULL) {
        $subscribes = getUserSubscribes($conn, $user);
    } else {
        $subscribes = array();
    }

?>
    <nav id="navbar-saiddit" class="navbar">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="position:absolute; left:0px; width:100%; background-color:#F0F0F0;">
                <ul class="nav navbar-nav" >
                    <?php 
                        if ($subscribes != NULL) {
                            printSubscribeDropdown($subscribes);
                        }
                    ?>
                    <?php echo '<li><a style="color:black;" href="'.$dir.'homepage.php">FRONT</a></li>'; ?>
                    <?php echo '<li><a style="color:black;" href="'.$dir.'homepage.php?s=all">ALL</a></li>'; ?>
                    <?php echo '<li><a style="color:black;" href="'.$dir.'homepage.php?s=random">RANDOM</a></li>'; ?>
                    <?php
                        foreach ($subsaiddits as &$sub) {
                            echo " <li> <a style='color:black;' href=".$dir."homepage.php?s=".$sub['title']. ">";
                            echo strtoupper($sub['title']);
                            echo "</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
<?php
}
?>
