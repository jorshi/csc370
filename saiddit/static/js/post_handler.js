

function postCallback(data) {

    var postDiv = $('#content');
    var postTemplate = $('.post-template');

    for (i = 0; i < data.length; i++) {
        console.log(data[i]);
        newPost = postTemplate.clone();
        newPost.find('.post-votes').text(data[i].vote_total);
        newPost.find('.post-title').text(data[i].title);
        postInfo = newPost.find('.post-info');
        postInfo.text(
            'Submitted by ' + data[i].author +
            ' at ' + data[i].publish_time + ' to '
        );
        postInfo.append('<a href="#">' + data[i].subsaiddit + '</a>');
        newPost.appendTo(postDiv);
        newPost.show();
    }

}

function getPosts() {

    $.ajax({
        method: "GET",
        url: "interface/posts.php",
        dataType: "json"
    }).done(postCallback);
}


$(document).ready(function() {
    getPosts();
});
