document.addEventListener('DOMContentLoaded', function() {
    console.log(1000);
    var ID_h_hm_crm_nav_bar3 = document.getElementById('h_hm_crm_nav_bar3');

    var dHamburger = document.getElementById('dHamburger');
    var dCross = document.getElementById('dCross');


if(ID_h_hm_crm_nav_bar3) {
    if (dHamburger) {
        dHamburger.addEventListener("click", function () {
            dHamburger.classList.remove("container");
            dHamburger.classList.add("containerCacher");
            dCross.classList.remove("changeCacher");
            dCross.classList.add("change");


            cross.classList.add("menu-menu-header-container");
            cross.classList.remove("contentCacher");
        });
    };

    if (dCross) {
        dCross.addEventListener("click", function () {
            dCross.classList.remove("change");
            dCross.classList.add("changeCacher");
            dHamburger.classList.remove("containerCacher");
            dHamburger.classList.add("container");


            cross.classList.add("contentCacher");
            cross.classList.remove("menu-menu-header-container");

        });
    };

};

});

