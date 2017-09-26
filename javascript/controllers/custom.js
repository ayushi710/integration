setTimeout(function(){
    $('.calls').hide();
    var flag = 0;
    $('.sample-btn').on('click', function(){
        console.log("clicked");
        $(this).next().toggle();
        if(flag === 0) {
            $(this).text("Close Sample Call");
            flag = 1;
        }
        else {
            $(this).text("Sample Call");
            flag = 0;
        }

    });

},250);