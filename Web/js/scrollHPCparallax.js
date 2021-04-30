document.addEventListener('DOMContentLoaded', function() {
    var header3 = document.querySelector(".myheaderParallax");
    var para = document.querySelector(".flex-row");
    //var topheader = document.querySelector(".topheader");


    function scrolled(){
        var paraHeight = para.offsetHeight,
            currentScroll = document.body.scrollTop || document.documentElement.scrollTop;


        if(currentScroll > paraHeight*1.15)
        {
            //header3.classList.remove("myheader2");
            header3.classList.add("fixed");

        }
        else if(currentScroll == 0)
        {
            header3.classList.remove("fixed");
            header3.classList.add("myheader2");

        }


    }

    addEventListener("scroll", scrolled, false);
});