isdragging = false;
startScrolling = 0;
slided = 0;
newSlided = 0;
let mysliders = document.querySelectorAll(".myslider");
mysliders.forEach(function (myslider) {
    let myslider_con;
    myslider.addEventListener("mousedown", function (a) {
        myslider_con = this.parentElement;
        myslider_con.classList.add("grabbing");
        startScrolling = a.pageX;
        isdragging = true;
    });
    myslider.addEventListener("mouseup", function () {
        myslider_con.classList.remove("grabbing");
        slided = newSlided;
        isdragging = false;
    });
    myslider.addEventListener("mouseenter", function () {
        myslider_con = this.parentElement;
    });
    myslider.addEventListener("mouseleave", function () {
        myslider_con.classList.remove("grabbing");
        slided = newSlided;
        isdragging = false;
    });
    myslider.addEventListener("mousemove", function (a) {
        if (isdragging) {
            newSlided = (a.pageX - startScrolling) + slided;
            requestAnimationFrame(slide);
        }
    });

    function slide() {

        if (newSlided <= (myslider_con.offsetWidth - myslider.offsetWidth)) {
            newSlided = (myslider_con.offsetWidth - myslider.offsetWidth);
        } else if (newSlided > 0) {
            newSlided = 0;
        }
        myslider.style.transform = `translateX(${newSlided}px)`;
    }

})