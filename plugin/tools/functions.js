function setCookie(cname, cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (86400 * 7 * 1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function setLanguage(key, lang, isReload) {
    setCookie(key + 'lang', lang);
    if (isReload) {
        var url = window.location.href;
        var urlParts = url.split('?');
        var newUrl = urlParts[0];
        if (urlParts.length > 1) {
            var params = urlParts[1].split('&');
            for (var i = 0; i < params.length; i++) {
                if (params[i].indexOf('lang=') == -1) {
                    newUrl += '&' + params[i];
                }
            }
        }
        window.location.href = newUrl;
    }
}

function getLanguage(key) {
    var lang = getCookie(key + 'lang');
    if (lang == '') {
        lang = 'en';
    }
    return lang;
}

function changeChannel(channel) {
    window.location.href = 'video.php?type=' + channel;
}

window.onload = function(){
    var url = new URL(window.location.href);
    if (url.searchParams.has('r')) {
        url.searchParams.delete('r');
        url.searchParams.set('t', Date.now());
        window.history.replaceState({}, document.title, url.toString());
    } else if (url.searchParams.has('t')) {
        url.searchParams.set('t', Date.now());
        url.searchParams.set('r', '1');
        window.history.replaceState({}, document.title, url.toString());
        location.reload();
    }
}