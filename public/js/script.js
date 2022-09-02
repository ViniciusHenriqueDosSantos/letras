var letraDiv = document.getElementById('letra')
                var letra =document.getElementsByClassName('egMi0 kCrYT')
                var placeholder = document.getElementById('placeholder')
                
                console.log(letra[0].children[0].getAttribute('href'))
                console.log(letra[1].children[0].getAttribute('href'))
                console.log(letra[2].children[0].getAttribute('href'))
                console.log(letra[3].children[0].getAttribute('href'))
letra.forEach(element => {
    if (element.children[0].getAttribute('href').includes('vagalume')) {
        console.log(element.children[0].getAttribute('href'))
    }
});
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

document.getElementsByClassName('cnt-letra')