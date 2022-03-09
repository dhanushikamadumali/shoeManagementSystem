    $("#toggle").click(function(){
        $("#menu").toggleClass('active');
        $("#content").toggleClass('active');
        
    });
    $(".dropicon").click(function(){
        $(this).find("i").toggleClass("fas fa-angle-down  fas fa-angle-left");          
    });
    
    
    $("#search-btn").click(function(){ 
        $("#icon").toggleClass('active');
        $(this).toggleClass('bg-change');
       $(this).toggleClass('animate');
    });
  
