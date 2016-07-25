var entire_data = '';

function postCallback(data) {
    entire_data = data;
    var postDiv = $('#content');
    var postTemplate = $('.post-template');

    for (i = 0; i < data.length; i++) {
        //console.log(data[i]);
        newPost = postTemplate.clone();

        //newPost.find('.post-votes').text(data[i].vote_total);
        newPost.find('.post-votes').text(data[i].vote_total);
        newPost.find('.post-title').text(data[i].title);
        postInfo = newPost.find('.post-info');
        postInfo.text(
            'Submitted by ' + data[i].author +
            ' at ' + data[i].publish_time + ' to '
        );
        url = location.pathname + "?s=" + data[i].subsaiddit;
        commentButton = newPost.find('.new_comment_button');
        commentButton.append("<a href='#' class='comment_button' id='comment_button' onclick='newComment(\""+data[i].post_id+'\",\"'+data[i].subsaiddit+'\",\"'+i+"\")' style='color:black;'> COMMENT ON THIS POST </a>");

        deleteButton = newPost.find('.delete_post_button');
        deleteButton.append('<a href="#" onclick="deletePost('+data[i].post_id+')" style="color:black;">DELETE POST</a>');
        newPost.find('#post_id').text(data[i].post_id);
        newPost.find('#subsaiddit_id').text(data[i].subsaiddit);
        $.ajax({
            method: "POST",
            url: "/interface/comments.php",
            data: {post:data[i].post_id},
            dataType: 'json',
            async:false,
            success: function(array){
                var comment = array[0];
                var author = array[1];
                var time = array[2];

                for (j=0; j<comment.length; j++){
                    //console.log("INNER LOOP: "+j);
                    //console.log("COMMENT FOR POST #"+i+": "+comment[j]);
                    newPost.find('.media-body').append('<div class="media-left post-comments" id="post-comment'+j+'" style="position:relative; width:600px; height:100px;"><div class="author'+j+'" id="author'+j+'" style="position:absolute; left:0px; top:0px; font-size:20px; font-weight:bold;"></div><div class="time'+j+'" id="time'+j+'" style="color:grey; position:absolute; right:0px;top:0px;"></div><br><br><div class="comment'+j+'" id="comment'+j+'" style="color:black; position:absolute; left:0px; font-size:15px;"></div><b><div class="reply'+j+'" id="reply'+j+'" style="position:absolute; bottom:0px; left:0px; color:black;"></div></b></div><br><br><br>');
                    
                    newPost.find('.comment'+j).text(comment[j]);
                    newPost.find('.author'+j).text('[-] '+author[j]);
                    newPost.find('.time'+j).text(time[j]);

                    newPost.find('.reply'+j).text('permalink    embed    save    report    give gold    reply');
                    newPost.find('.delete'+j).text('DELETE POST');
                }
            }
        });
        document.getElementById('current_iteration').setAttribute('value', i);
        postInfo.append('<a href="' + url + '">' + data[i].subsaiddit + '</a>');
        newPost.appendTo(postDiv);
        newPost.show();
    }
}

function getPosts(postData) {
    $.ajax({
        method: "GET",
        url: "/interface/posts.php",
        data: postData,
        dataType: "json"
    }).done(postCallback);
}

// Read a page's GET URL variables and return them as an associative array.
function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

$(document).ready(function() {
    
    var subsaiddit = $('#subsaiddit').val();
    var data = {};

    if (subsaiddit == null || subsaiddit == "front") {
        data['subsaiddit'] = 'front';
    } else {
        data['subsaiddit'] = subsaiddit;
    }

    getPosts(data);
});
