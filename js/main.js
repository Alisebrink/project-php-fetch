"use strict";

let widget = document.getElementById('widget');
let xhr = new XMLHttpRequest();
window.onload = getJson();

function getJson() {
    xhr.onload = function() {
        if(xhr.status === 200) {
            let obj = JSON.parse(xhr.responseText);
            printResult(obj);
        }
    }
    xhr.open('GET', 'json.php?numposts=3', true);
    xhr.send();
}

function printResult(obj) {
    for(let i = 0; i < obj.length; i++) {
        widget.innerHTML += "<article class='widget-post'><h3>" + obj[i].user + "</h3>" +
        "<p class='wmessage'>" + obj[i].content + "</p>" +
        "<h4>" + obj[i].created + "</h4></article>";
    }
}