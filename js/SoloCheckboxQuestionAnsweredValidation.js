$("h2").before("<div class='EndH2' style='width: 0px; height: 0px;'><div>");
function QuestionAnsweredValidation(){
    var ToReturn = true;
    $("form > h2").each(function(indexH2){
        var ObjectH2 = $(this);
        var CantCheckeds = 0;
        var CheckboxCheckeds = 0;
        //alert("Question: " + ObjectH2.html());
        ObjectH2.find("~*").each(function(indexP){
            var ObjectP = $(this);
            if(!ObjectP.hasClass("EndH2")){
                var ObjectCheckboxes = ObjectP.find("input[type='checkbox']");
                var ObjectInputRadio = ObjectP.find("input[type='radio']");
                if(ObjectInputRadio.length){
                    //alert("Answer Option Radio: " + ObjectP.html());
                    if(ObjectInputRadio.is(":checked")){
                        CantCheckeds++;
                    }
                }
                if(ObjectCheckboxes.length){
                    //alert("Answer Option Checkbox: " + ObjectP.html());
                    if(ObjectCheckboxes.is(":checked")){
                        CheckboxCheckeds++;
                    }
                }
            }else{
                return false;
            }
        });
        //alert("Checkboxes: "+CheckboxCheckeds);
        //alert("Radio: "+CantCheckeds);
        if((CheckboxCheckeds == 0) && (CantCheckeds == 0)){
            ToReturn = false;
        }
        /*if(CheckboxCheckeds == 0){
            ToReturn = false;
        }
        if(CantCheckeds == 0){
            ToReturn = false;
        }*/
    });
    if(!ToReturn){
        alert("Debe llenar todas las preguntas");
    }
    return ToReturn;
}