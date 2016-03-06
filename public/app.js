function confirmDelete(path) {
    if (confirm('Quer mesmo remover esse valor? Essa ação não tem volta!')) {
        var httpRequest;
        if (window.XMLHttpRequest) {
            httpRequest = new XMLHttpRequest();
        }
        httpRequest.open("DELETE", path, false);
        httpRequest.send();
    }
}
var recalculate = function(){
    return function(){
        var parcelas = $("#select-charges").val();
        if(parcelas>0){
            var total = $("#total").val();
            var charges_div = $('#charges-div');
            var parcela = Math.round(total/parcelas * 100) / 100;
            charges_div.empty();
            for(var i = 1;i<=parcelas;i++){
                charges_div.append(
                    '<div class="form-group">' +
                    '<label for="total">Parcela '+i+'</label>' +
                    '<input class="form-control" step="any" type="number" name="installments[]" id="installments[]" value="'+parcela+'">' +
                    '</div>');
            }
        }
    }
};


$(document).ready(function(){
    $("#select-charges").on('change',recalculate());
    $("#total").on('blur',recalculate());
});