function currTime(offset) {
    var d = new Date();

    var utc = d.getTime() + (d.getTimezoneOffset() * 60000);
    var nd = new Date(utc + (3600000 * offset));
    return nd;
}

const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

function time() {
    // gmt +7
    var d = new currTime(8);

    var s = d.getSeconds();
    var m = d.getMinutes();
    var h = d.getHours();

    var bD = d.getDate();
    var bM = monthNames[d.getMonth()];
    var bY = d.getFullYear();

    var span = document.getElementById('span');

    span.textContent = bD + " " + bM + " " + bY
    + ", " + ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2)
    + " GMT +8" ;
    var t = setTimeout(time, 500);
}
