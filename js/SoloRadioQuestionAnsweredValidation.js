$("h2").before("<div class='EndH2' style='width: 0px; height: 0px;'><div>");
function QuestionAnsweredValidation(){
    var ToReturn = true;
    //var CantCheckeds = 0;
    $("form > h2").each(function(indexH2){
        var ObjectH2 = $(this);
        var CantCheckeds = 0;
        //alert("Question: " + ObjectH2.html());
        ObjectH2.find("~*").each(function(indexP){
            var ObjectP = $(this);
            if(!ObjectP.hasClass("EndH2")){
                //alert(ObjectP.html());
                var ObjectTable = ObjectP.find("table");
                if(!ObjectTable.length){
                    var ObjectTable = ObjectP;
                }
                if(ObjectTable.is("table")){
                    var ObjectInputRadioWithValueZero = ObjectP.find("~p input[type='radio'][value='0']").first();
                    var ObjectCheckboxes = ObjectTable.find("input[type='checkbox']");
                    if(ObjectCheckboxes.length){
                        var CheckboxCheckeds = 0;
                        ObjectTable.find("tr").each(function(indexTr){
                            var ObjectTr = $(this);
                            ObjectTr.find("td").each(function(indexTd){
                                var ObjectTd = $(this);
                                var ObjectInputCheckbox = ObjectTd.find("input[type='checkbox']");
                                if(ObjectInputCheckbox.is(":checked")){
                                    CheckboxCheckeds++;
                                }
                            });
                        });
                        if(CheckboxCheckeds == 0){
                            if(ObjectInputRadioWithValueZero.length){
                                if(!ObjectInputRadioWithValueZero.is(":checked")){
                                    ToReturn = false;
                                }
                            }
                        }else{
                            CantCheckeds++;
                        }
                    }else{
                        var Boolean = true;
                        ObjectTable.find("tr").each(function(indexTr){
                            var ObjectTr = $(this);
                            var RadiobuttonsCheckeds = 0;
                            if(ObjectTr.find("td input[type='radio']").length){
                                ObjectTr.find("td").each(function(indexTd){
                                    var ObjectTd = $(this);
                                    var ObjectInputRadio = ObjectTd.find("input[type='radio']");
                                    if(ObjectInputRadio.val() == "0"){
                                        if((!ObjectInputRadio.is(":checked")) && (Boolean)){
                                            RadiobuttonsCheckeds++;
                                        }
                                        if((ObjectInputRadio.is(":checked")) ){
                                            RadiobuttonsCheckeds++;
                                            Boolean = true;
                                        }
                                    }else{
                                        if(ObjectInputRadio.is(":checked")){
                                            RadiobuttonsCheckeds++;
                                        }
                                    }
                                });
                                if(RadiobuttonsCheckeds == 0){
                                    Boolean = false;
                                }
                            }
                        });
                        if(!Boolean){
                            if(ObjectInputRadioWithValueZero.length){
                                if(!ObjectInputRadioWithValueZero.is(":checked")){
                                    ToReturn = false;
                                }
                            }
                        }else{
                            CantCheckeds++;
                        }
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
        });
        if(CantCheckeds == 0){
            ToReturn = false;
        }
    });
    if(!ToReturn){
        alert("Debe llenar todas las preguntas");
    }
    return ToReturn;
}