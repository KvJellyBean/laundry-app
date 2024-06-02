import "./bootstrap";

document.addEventListener("DOMContentLoaded", (event) => {
    console.log("DOM is ready.");
});

$(document).ready(function () {
    $(".letter").hover(
        function () {
            for (var i = 0; i < 5; i++) {
                $(this).append('<span class="bubble"></span>');
            }
            $(".bubble").each(function () {
                var size = Math.floor(Math.random() * 10) + 10;
                $(this).css({
                    width: size + "px",
                    height: size + "px",
                    left: Math.random() * 100 + "%",
                    "animation-duration": Math.random() * 2 + 2 + "s",
                    "animation-delay": Math.random() * 2 + "s",
                });
            });
        },
        function () {
            $(".bubble").remove();
        }
    );
});
