<?php

include_once "db_utils/subsaiddit_factory.php";

function printNavigation($conn) {

    $subsaiddits = getFrontPage($conn);

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
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="homepage.php">FRONT</a></li>
                    <li><a href="homepage.php?s=all">ALL</a></li>
                    <li><a href="homepage.php?s=random">RANDOM</a></li>
                    <?php
                        foreach ($subsaiddits as &$sub) {
                            echo "<li><a href=homepage.php?s=".$sub['title']. ">";
                            echo strtoupper($sub['title']);
                            echo "</li></a>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
<?php
}
?>
