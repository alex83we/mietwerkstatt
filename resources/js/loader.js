document.onreadystatechange = function () {
    if (document.readyState !== "complete") {
        document.querySelector('body').style.visibility="hidden";
        document.querySelector('#load').style.visibility="visible";
    } else {
        document.querySelector('#load').style.visibility="hidden";
        document.querySelector('body').style.visibility="visible";
    };
}