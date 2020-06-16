$(document).ready(function(){
    var imgItems = $('.slider li').length;
    var imgPos = 1;
    $('')
    $('.slider li').hide();
    $('.slider li:first').show();

    $('.left span').click(prevSlider);
    $('.right span').click(nextSlider);
    

    // Functions ----------------------
    function prevSlider(){
        if(imgPos == 1){
            imgPos = imgItems;
        }else{
            imgPos--;
        }
        $('.slider li').hide();
        $('.slider li:nth-child('+ imgPos +')').fadeIn();
    }

    function nextSlider(){
        if(imgPos >= imgItems){
            imgPos = 1;
        }else{
            imgPos++;
        }
        $('.slider li').hide();
        $('.slider li:nth-child('+ imgPos +')').fadeIn();
    }

});