$(document).ready(function(){
    $("#btnModalReset").on("click", function(){
        $("#btnFilterReset").click();
    });
    $("#btnModalApply").on("click", function(){
        $("#btnFilterSearch").click();
    });
});
