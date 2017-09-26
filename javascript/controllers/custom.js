$(document).ready(function(){
    console.log("ready to execute");
    console.log("element is ", $('.calls'));
    $('.calls').hide(function () {
        console.log('done');
    });
    console.log("call hide");
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

});