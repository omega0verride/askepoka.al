function upVote(post_id) {
    console.log('upvote');

    cnt = parseInt(document.getElementById("post_" + post_id + "_cnt").innerHTML);
    upBtn = document.getElementById("upBtn_" + post_id);
    downBtn = document.getElementById("downBtn_" + post_id);

    change = 0;
    if (upBtn.classList.contains("vote-btn-checked")) {
        upBtn.classList.remove("vote-btn-checked");
        value = 0;
        change -= 1;
    } else {
        upBtn.classList.add("vote-btn-checked");
        if (downBtn.classList.contains("vote-btn-checked")) {
            downBtn.classList.remove("vote-btn-checked");
            change += 1;
        }
        value=1;
        change += 1;
    }

    document.getElementById("post_" + post_id + "_cnt").innerHTML = cnt + change;

    url = "/askepoka.al/src/validate/validate_vote.php?postId=" + post_id + "&value=" + value;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {

        },
        error: function (xhr) {
            document.getElementById("post_" + post_id + "_cnt").innerHTML = cnt;
        }
    });
}

function downVote(post_id) {
    console.log('downvote');

    cnt = parseInt(document.getElementById("post_" + post_id + "_cnt").innerHTML);
    upBtn = document.getElementById("upBtn_" + post_id);
    downBtn = document.getElementById("downBtn_" + post_id);

    change = 0;
    if (downBtn.classList.contains("vote-btn-checked")) {
        downBtn.classList.remove("vote-btn-checked");
        value = 0;
        change += 1;
    } else {
        downBtn.classList.add("vote-btn-checked");
        if (upBtn.classList.contains("vote-btn-checked")) {
            upBtn.classList.remove("vote-btn-checked");
            change -= 1;
        }
        value = -1;
        change -= 1;
    }
    document.getElementById("post_" + post_id + "_cnt").innerHTML = cnt + change;

    url = "/askepoka.al/src/validate/validate_vote.php?postId=" + post_id + "&value=" + value;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {

        },
        error: function (xhr) {
            document.getElementById("post_" + post_id + "_cnt").innerHTML = cnt;
        }
    });
}