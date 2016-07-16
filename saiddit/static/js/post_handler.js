

function postCallback(data) {

    var postDiv = $('#content');
    var postTemplate = $('.post-template');

    for (i = 0; i < data.length; i++) {
        console.log(data[i]);
        newPost = postTemplate.clone();
        newPost.find('.post-title').text(data[i].title);
        newPost.find('.post-user').text(data[i].author);
        newPost.appendTo(postDiv);
        newPost.show();
    }

}

function getPosts() {

    $.ajax({
        method: "GET",
        url: "posts.php",
        dataType: "json"
    }).done(postCallback);
}


$(document).ready(function() {
    getPosts();
});
