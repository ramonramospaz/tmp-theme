$(document).ready(function(){
    var CanSumbmit = false;
    $("input[name='siguiente']").click(function(e){
        if(!CanSumbmit){
            var percentCounter = 0;
            $("form").find(".percent").each(function(index){
                var name = $(this).attr("name");
                var value = Number($(this).val());
                percentCounter = percentCounter + value;
            });
            if(percentCounter > 100){
                e.preventDefault();
                alert("La sumatoria de los porcentajes no debe ser mayor a 100.");
                return false;
            }else{
                CanSumbmit = true;
                $("input[name='siguiente']").click();
            }
        }
    });
});