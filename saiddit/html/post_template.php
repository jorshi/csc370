<?php

function printPostTemplate($user) {
?>
    <div class="media panel panel-default post-template" style="display:none">
        <div class="media-left post-votes-wrapper">
            <span class="glyphicon glyphicon-chevron-up vote-glyph"></span>
            <span class="post-votes"></span>
            <span class="glyphicon glyphicon-chevron-down vote-glyph"></span>
        </div>
        <div class="media-left">
            <img class="media-object" src="static/img/lil_s.png" height="64" width="64">
        </div>
        <div class="media-body">
            <div class="media-heading">
                <a href="#">
                    <h4 class="post-title"></h4>
                </a>
            </div>
            <p class="media-left post-info"><p>
        </div>
    </div>
<?php
}
?>
