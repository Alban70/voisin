document.addEventListener('DOMContentLoaded', function() {
    var header2 = document.querySelector(".myheader2");
    var topNav = document.querySelector(".ribbon");
    //var topheader = document.querySelector(".topheader");


    function scrolled(){
        var topNavHeight = topNav.offsetHeight,
            currentScroll = document.body.scrollTop || document.documentElement.scrollTop;


        if(currentScroll > topNavHeight*1.15)
        {
            //header2.classList.remove("myheader2");
            header2.classList.add("fixed");

        }
        else if(currentScroll == 0)
        {
            header2.classList.remove("fixed");
            header2.classList.add("myheader2");

        }


    }

    addEventListener("scroll", scrolled, false);
});