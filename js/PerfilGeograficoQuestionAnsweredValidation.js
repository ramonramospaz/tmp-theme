$("h2").before("<div class='EndH2' style='width: 0px; height: 0px;'><div>");
function QuestionAnsweredValidation(){
    var ToReturn = true;
    $("form > h2").each(function(indexH2){
        var ObjectH2 = $(this);
        //alert("Question: " + ObjectH2.html());
        var CantCheckeds = 0;
        var FillQuestions = false; //Variable para hacer obligatorio el mensaje de llenado de todas las preguntas para cuando esta este en "true"
        ObjectH2.find("~*").each(function(indexP){
            var ObjectP = $(this);
            if(!ObjectP.hasClass("EndH2")){
                if((ObjectP.attr("id") == "d_box1") || (ObjectP.attr("id") == "d_box2")){
                    if(ObjectP.hasClass("active")){
                        var ObjectTable = ObjectP.find("table");
                        ObjectTable.find("tr").each(function(indexTr){
                            var ObjectTr = $(this);
                            if(indexTr > 0){
                                var ContChecksByTr = 0;
                                ObjectTr.find("td").each(function(indexTd){
                                    var ObjectTd = $(this);
                                    var ObjectInputRadio = ObjectTd.find("input[type='radio']");
                                    if(ObjectInputRadio.is(":checked")){
                                        ContChecksByTr++;
                                    }
                                });
                                if(ContChecksByTr == 0){
                                    FillQuestions = true;
                                    return false;
                                }
                            }
                        });
                    }
                }else{
                    var ObjectInputRadio = ObjectP.find("input[type='radio']");
                    if(ObjectInputRadio.length){
                        //alert("Answer Option: " + ObjectP.html());
                        if(ObjectInputRadio.is(":checked")){
                            CantCheckeds++;
                        }
                    }
                }
            }else{
                return false;
            }
            if(FillQuestions){
                return false;
            }
        });
        if((CantCheckeds == 0) || (FillQuestions)){
            ToReturn = false;
        }
    });
    if(!ToReturn){
        alert("Debe llenar todas las preguntas");
    }
    return ToReturn;
}