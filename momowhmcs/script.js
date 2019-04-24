$(document).ready(function () { 
    $('#submt').click(function(){
        //check input validity
        var number = $("#number").val();
        if(number.length == 9){
            $("#step1").fadeOut("slow", function () {
                $("#step2").fadeIn("slow");
                $("#step2").removeClass("d-none");
            });
            $.ajax({
                type: "POST",
                url: "index-old2.php",
                data: $("#mtnform").serialize(),
                success: function(response){
                    resjson = JSON.parse(response);
                    if(resjson.StatusCode == 01){
                        $("#step2").fadeOut("slow", function () {
                            $("#step3").fadeIn("slow");
                            $("#step3").removeClass("d-none");
                        });
                    }else{
                        $("#step2").fadeOut("slow", function () {
                            $("#step4").fadeIn("slow");
                            $("#step4").removeClass("d-none");
                        });
                    }
                },
                error: function(e){
                    alert(e.responseText);
                }
            });
            
        }else{
            alert("Numero Incorrect!");
        }
    });
});