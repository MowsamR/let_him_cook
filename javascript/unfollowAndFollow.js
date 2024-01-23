function makeRequest(url, data, successCallback, errorCallback) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4) {
            if (xhttp.status == 200) {
                var response = JSON.parse(xhttp.responseText);
                successCallback(response);
            } else {
                errorCallback(xhttp.status);
            }
        }
    };
}

function unfollowUser(followerID, userID) {
    var data = "followerID=" + followerID + "&userID=" + userID;

    makeRequest("./php_scripts/unfollow.php", data, function (response) {
        const element = document.getElementById("unfollowUser" + followerID);
        element.classList.remove("modal-unfollow-btn");
        element.classList.add("modal-follow-btn");
        element.innerText = "Follow";
        element.onclick = function () {
            followUser(followerID, userID);
        };
        element.id = "followUser" + followerID;
    }, function (errorStatus) {
        alert('Error unfollowing user. Status: ' + errorStatus);
    });
}

function followUser(followerID, userID) {
    var data = "followerID=" + followerID + "&userID=" + userID;

    makeRequest("./php_scripts/follow.php", data, function (response) {
        const element = document.getElementById("followUser" + followerID);
        element.classList.remove("modal-follow-btn");
        element.classList.add("modal-unfollow-btn");
        element.innerText = "Unfollow";
        element.onclick = function () {
            unfollowUser(followerID, userID);
        };
        element.id = "unfollowUser" + followerID;
    }, function (errorStatus) {
        alert('Error following user. Status: ' + errorStatus);
    });
}
