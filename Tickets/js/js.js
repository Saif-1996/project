$(function() {    // Makes sure the code contained doesn't run until
                  //     all the DOM elements have loaded

    $('#select1').change(function(){
        
        debugger;
        if($(this).val() == '2'){
            $('#sel1').show();
        }else
        { 
            $('#sel1').hide();
        }
    });

});