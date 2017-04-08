window.fbAsyncInit = function () {

    FB.init({
        appId: '444635509206502',
        xfbml: true,
        version: 'v2.8'
    });


    FB.getLoginStatus(function (response) {
        if (response.status === 'connected') {
            document.getElementById('status').innerHTML = 'You are logged in';
        } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = 'You are not logged in';
        }
        else {
            document.getElementById('status').innerHTML='you are not logged into facebook';
        }
    });


};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

