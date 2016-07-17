<?php
    include('db_utils/connect.php');
    include('db_utils/subsaiddit_factory.php');
    include('connect/login.php');
    include('connect/signup.php');
    include('connect/user.php');
    include('utility/logging.php');

    include('html/banner.php');
    include('html/head.php');
    include('html/main.php');
    include('html/footer.php');
    include('html/post_template.php');

    $conn = db_connect();
    $user = getSessionUser();
    $request = $_GET;
    $error = NULL;

    if (isset($request['s'])) {
        $subsaiddit = $request['s'];
        if (!isSubsaiddit($conn, $subsaiddit))  {
            $error = "Subsaiddit does not exist";
            $subsaiddit = "front";
        }
    } else {
        $subsaiddit = "front";
    }

    if ($subsaiddit == "random") {
        $subsaiddit = getRandom($conn);
    }
?>

<!DOCTYPE html>
<html>

    <!-- Print the page head. html/head.php -->
    <?php printHead($user); ?>

    <body>

        <!--MAIN [area where things that are not immediately on page will be (popups, etc)]-->
        <?php printMain($user); ?>

        <!--HEAD BANNER [the top area of page where headers, nav bar, etc. are]-->
        <?php printBanner($user, $subsaiddit); ?>
        

        <!-- BODY [the area for saiddit and subsaiddit content and advertisement (like on reddit)]-->
            <div id='body'>
                <div id='content'>
                    <div class="list-group"></div>
                </div>
                <div id='ads'>
                    <button class='new' id='new_link' >Submit a new link</button><br><br>
                    <button class='new' id='new_post' onclick='add_new()'>Submit a new text post</button>
                </div>
            </div>

        <!-- FOOT [as seen in reddit there is a bottom area with some links (just for show)]-->
        <?php printFooter($user); ?>

        <!-- POST TEMPLATE -->
        <?php printPostTemplate($user) ?>

        <input style="display:none" id="subsaiddit" value="<?php echo $subsaiddit ?>"/>

    </body>
</html>
