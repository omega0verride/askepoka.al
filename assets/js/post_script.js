function upVote(post_id) {
    console.log('upvote');
    $.ajax({
        url: "/askepoka.al/src/validate/validate_vote.php?postId=" + post_id + "&value=1",
        type: "GET",
        success: function (response) {

        },
        error: function (xhr) {

        }
    });
    // document.getElementById("post_"+post_id+"_cnt")
}

function downVote(post_id) {
    console.log('downvote');
    $.ajax({
        url: "/askepoka.al/src/validate/validate_vote.php?postId=" + post_id + "&value=-1",
        type: "GET",
        success: function (response) {

        },
        error: function (xhr) {

        }
    });
}