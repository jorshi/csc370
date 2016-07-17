

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
        url = location.pathname + "?s=" + data[i].subsaiddit;
        postInfo.append('<a href="' + url + '">' + data[i].subsaiddit + '</a>');
        newPost.appendTo(postDiv);
        newPost.show();
    }

}

function getPosts(postData) {

    $.ajax({
        method: "GET",
        url: "interface/posts.php",
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
