var header = document.querySelector(".myheader2");
//var header2 = document.querySelector("#page myheader2");
var topheader = document.querySelector(".topheader");

var navCM = document.querySelector(".menu_fonct4");
var navCM5 = document.querySelector(".menu_fonct5");
var navCM6 = document.querySelector("#seoAudit");
var navCM6M = document.querySelector("#seoPrestM");
var navCM6D = document.querySelector("#seoPrestD");
//var navCM6 = document.querySelector(".menu_fonct_HP");
var menu_fonct4Fixed = document.querySelector(".menu_fonct4Fixed");

var ctafonc4 = document.querySelector("#fonct .cta-fonct4");
//var navPrestations = document.querySelector("#fonct myheader2");

var fonctionCM4_1 = document.querySelector("#ab");
var fonctionCM4_2 = document.querySelector("#ac");
var fonctionVente = document.querySelector("#fonct .fonction");
var fonctionTxt = document.querySelector("#fonct .fonct_txt");
var logo = document.querySelector("#h_hm_crm_nav_bar3 .logo");
var RS = document.querySelector("#h_hm_crm_nav_bar3 .reseau_social2");
var coordonnees = document.querySelector("#h_hm_crm_nav_bar3 .coordonnees2");
var nav = document.querySelector("#h_hm_crm_nav_bar3 .nav_bar");
function scrolled(){
var topheaderHeight = topheader.offsetHeight,
currentScroll = document.body.scrollTop || document.documentElement.scrollTop;
	
if(currentScroll >= topheaderHeight*1.15)
{
    header.classList.add("fixed");


    if(navCM){
        navCM.classList.remove("menu_fonct4Normal");
        navCM.classList.add("menu_fonct4Fixed");
    };
    if(navCM5){
        navCM5.classList.remove("menu_fonct4Normal");
        navCM5.classList.add("menu_fonct4Fixed");
        navCM5.style.width="auto";
        //menu_fonct4Fixed.style.width="auto";
    };
    if(navCM6){
        navCM6.classList.remove("menu_fonct6");
        navCM6.classList.add("menu_fonct6Fixed");

    };
    if(navCM6M){
        navCM6M.classList.remove("menu_fonct6");
        navCM6M.classList.add("menu_fonct6Fixed");

    };
    /*if(navCM6D){
        navCM6D.classList.remove("menu_fonct6");
        navCM6D.classList.add("menu_fonct6Fixed");

    };*/
    if(navCM6){
        navCM6.classList.remove("menu_fonct4Normal");
        navCM6.classList.add("menu_fonct4Fixed");
    };
    /*if(navPrestations){
        navPrestations.classList.remove("myheader");
        navPrestations.classList.add("fixed");
    };*/
    /*if(ctafonc4){
        
        ctafonc4.classList.remove("ctanormal");
        ctafonc4.classList.add("ctafixed");
        fonctionCM4_1.classList.remove("fonct_CM5");
        fonctionCM4_1.classList.add("fonct_CM4_HP_Fixe");
        fonctionCM4_2.classList.remove("fonct_CM5");
        fonctionCM4_2.classList.add("fonct_CM4_HP_Fixe");
        fonctionVente.classList.remove("fonctionNormal");
        fonctionVente.classList.add("fonctionHP");
        fonctionTxt.classList.remove("fonct_txt");
        fonctionTxt.classList.add("fonct_txt_HP");
    };*/
    if(logo){
    logo.classList.remove("logoNormal");
    logo.classList.add("logoFixe");
    };
        if(RS){
    RS.classList.remove("reseau_social2Normal");
    RS.classList.add("reseau_social2Fixe");
    };
    if(coordonnees){
    coordonnees.classList.remove("coordNormal");
    coordonnees.classList.add("coordonnees2Fixe");
    };
    if(nav){
    nav.classList.remove("nav_bar");
    nav.classList.add("nav_barFixe");
    };

}
else if(currentScroll == 0)
{
    header.classList.remove("fixed");
    header.classList.add("myheader")

        if(navCM){
        navCM.classList.remove("menu_fonct4Fixed");
        navCM.classList.add("menu_fonct4Normal");
    };
    if(navCM5){
        navCM5.classList.remove("menu_fonct4Fixed");
        navCM5.classList.add("menu_fonct4Normal");
    };
    if(navCM6){
        navCM6.classList.remove("menu_fonct6Fixed");
        navCM6.classList.add("menu_fonct6");

    };
    if(navCM6M){
        navCM6M.classList.remove("menu_fonct6Fixed");
        navCM6M.classList.add("menu_fonct6");

    };
    /*if(navCM6D){
        navCM6D.classList.remove("menu_fonct6Fixed");
        navCM6D.classList.add("menu_fonct6");
    };*/
    if(navCM6){
        navCM6.classList.remove("menu_fonct4Fixed");
        navCM6.classList.add("menu_fonct4Normal");
    };
    /*if(navPrestations){
        navPrestations.classList.remove("fixed");
        navPrestations.classList.add("myheader2");
    };*/
    
    /*if(ctafonc4){
        ctafonc4.classList.remove("ctafixed");
        ctafonc4.classList.add("ctanormal");
        fonctionCM4_1.classList.remove("fonct_CM4_HP_Fixe");
        fonctionCM4_1.classList.add("fonct_CM5");
        fonctionCM4_2.classList.remove("fonct_CM4_HP_Fixe");
        fonctionCM4_2.classList.add("fonct_CM5");
        fonctionVente.classList.remove("fonctionHP");
        fonctionVente.classList.add("fonctionNormal");
        fonctionTxt.classList.remove("fonct_txt_HP");
        fonctionTxt.classList.add("fonct_txt");
    };*/
    
    if(logo){
    logo.classList.remove("logoFixe");
    logo.classList.add("logoNormal");
    };
    
    if(RS){
    RS.classList.remove("reseau_social2Fixe");
    RS.classList.add("reseau_social2Normal");
    };
    
    if(coordonnees){
    coordonnees.classList.remove("coordonnees2Fixe");
    coordonnees.classList.add("coordNormal");
    };
    
    if(nav){
    nav.classList.remove("nav_barFixe");
    nav.classList.add("nav_bar");
    };

}

//header.className = (currentScroll > topheaderHeight*1.15) ? "fixed" : "";
    //header.className = (currentScroll > 0) ? "fixed" : "";
}

addEventListener("scroll", scrolled, false);