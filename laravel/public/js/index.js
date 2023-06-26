$(document).ready(()=>{
    $("body").animate({"opacity": "1", "height":"80vh"},1000);
    setTimeout(() => {
        $("h1").css("color","green");
    }, 900);
});