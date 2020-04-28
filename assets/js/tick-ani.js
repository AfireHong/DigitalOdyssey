//支付成功打勾动画
window.onload = function () {
    var h = document.getElementById("header-pay");
    var g = document.getElementById("goto-pay");
    //加载完成后进行动画
    var t = document.getElementById("tick-circle");
    var p = document.getElementById("tick-poly");

    // prefixer helper function
    var pfx = ["webkit", "moz", "MS", "o", ""];

    function prefixedEventListener(element, type, callback) {
        for (var p = 0; p < pfx.length; p++) {
            if (!pfx[p]) type = type.toLowerCase();
            element.addEventListener(pfx[p] + type, callback, false);
        }
    }

    // new event listener function
    var circle = document.querySelector("#tick-circle");
    prefixedEventListener(circle, "AnimationEnd", function (e) {
        h.style.display = "block";
        g.style.display = "block";
    });
    t.style.animation = "circle 1s ease-in-out";
    t.style.animationDelay = ".6s";
    t.style.animationFillMode = "forwards";
    p.style.animation = "tick 0.5s ease-in-out";
    p.style.animationFillMode = "forwards";

}
//跳转倒计时
function CountD() {
    var time = document.getElementById("count-time");
    if (time.innerHTML == 0) {
        window.location.href = "index.html";
    } else {
        time.innerHTML = time.innerHTML - 1;
    }
}
window.setInterval("CountD()", 1000);