<?php

function printPostTemplate($user) {
?>
    <script>
        function newComment(post_id, subsaiddit, i){
            user = document.getElementById('current_user').getAttribute('value');
            if (user == null || user == ''){
                div_show();
            }
            else {
                div_show_comment();
                document.getElementById('post_id').value = post_id;
                document.getElementById('subsaiddit_id').value = subsaiddit;
            }
        }

        function div_show_comment() {
            clearFormSaiddit();
            document.getElementById('popup_comment').style.overflow = 'scroll';
            document.getElementById('popup_comment').style.display = 'block';
        }

        function div_hide_comment(){
            document.getElementById('popup_comment').style.display = 'none';
        }

    </script>
    <div id='current_user' value=''></div>
    <div id='current_iteration' value=''></div>
    <div class="media panel panel-default post-template" style="display:none;">
        <div class="media-left post-votes-wrapper">
            <span class="glyphicon glyphicon-chevron-up vote-glyph" style='color:grey;'></span>
            <span class="post-votes" style='color:grey;'></span>
            <span class="glyphicon glyphicon-chevron-down vote-glyph" style='color:grey;'></span>
        </div>
        <!-- Leave out the image for now
        <div class="media-left">
            <img class="media-object" src="static/img/lil_s.png" height="64" width="64">
        </div>
        -->
        <div class="media-body">
            <div class="media-heading">
                <a href="#" class="post-url">
                    <h4 class="post-title"></h4>
                </a>
            </div>
            <p class="media-left post-info"><p>
            <br>
            <br>
            <div class='new_comment_button'></div>
            <br>
        </div>

        <div id='popup_comment'>
            <div id='comment_block'>
                <div id='close_popup_comment' onclick ='div_hide_comment()'></div>
                <form id='comment_form' action='../interface/submit_comment.php' method='post'>
                    <div class='title'>ADD A COMMENT</div>
                    <br>
                    <input type='hidden' id='post_id' name='post_id'>
                    <input type='hidden' id='subsaiddit_id' name='subsaiddit_id'>
                    <input type='hidden' id='i' name='i'>
                    <textarea id='comment_content' name='comment_content' rows='10' cols='55'></textarea>
                    <br>
                    <input type='submit' id='submit_comment' name='submit_comment' style='font-size:12px;' value='SUBMIT'>
                </form>
            </div>
        </div>
    </div>

<?php
    echo "<script>
        var user = '".$user."';
        document.getElementById('current_user').setAttribute('value', user);
    </script>";
}
?>













