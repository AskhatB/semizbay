$(document).ready(function() {

    $("#formMain").submit(function() {
        $.ajax({
            type: "POST",
            url: "/",
            data: $(this).serialize()
        }).done(function() {
            $(this).find("input").val("");
            alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
            $("#formMain").trigger("reset");
        });
        return false;
    });
    
});