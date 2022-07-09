<style type="text/css">
.menu-btn{
    color: #ffffff;
    font-size: 23px;
    cursor: pointer;
    display: none;
}
.whatsapp-btn{
    position: fixed;
    color: #fff;
    height: 50px;
    width: 50px;
    right: 30px;
    bottom: 80px;
    text-align: center;
    z-index: 9999;
    background: green;
    border-radius: 40px;
    border-bottom-width: 2px;

}
.white-icon{
    color: #fff;
}

.scroll-up-btn{
    position: fixed;
    height: 45px;
    width: 42px;
    background: crimson;
    right: 30px;
    bottom: 10px;
    text-align: center;
    line-height: 45px;
    color: #fff;
    z-index: 9999;
    font-size: 30px;
    border-radius: 6px;
    border-bottom-width: 2px;
    cursor: pointer;
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s ease;
}
.scroll-up-btn.show{
    bottom: 30px;
    opacity: 1;
    pointer-events: auto;
}
.scroll-up-btn:hover{
    filter: brightness(90%);
}

</style>
<div class="whatsapp-btn">
        <a class="white-icon" href="https://api.whatsapp.com/send?phone=6287765108318&text=Saya%20tertarik%20untuk%20belanja"><i class="fab fa-whatsapp fa-3x"></i></a>
</div>
<div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
<script>
	$(document).ready(function(){
    $(window).scroll(function(){
        // sticky navbar on scroll script
        
        // scroll-up button show/hide script
        if(this.scrollY > 200){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // slide-up script
  $('.scroll-up-btn').on('click', function(){
    $('body,html').animate({scrollTop: 0}, 1000);
    })

});


</script>