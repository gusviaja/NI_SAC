
       
       $(document).ready(function() {
           {

                tr = $("#tbody>tr");
                tr.each(function(){
                    if($(this).find("#status").text() == "0")
                {
                    $(this).css("background","rgb(240,205,205)")
                }
                else{
                    $(this).css("background","rgb(222,245,200)")}
                });

           }
          
    
        
    });
    

        