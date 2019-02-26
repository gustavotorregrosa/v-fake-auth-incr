$("#btn-am-cadastrar-papel").on("click", function(){
    $("#mdl-cria-papel").modal("show");
});

$(".btn-edit-papel").on("click", function(){
    let id = $(this).data("id");
    let nome = $(this).parents("tr").find(".nome-papel").html();
    $("#inp-edita-papel").val(nome);
    let baseUrl = $("#mdl-cria-papel form").attr("action");
    $("#frm-edita-papel").attr("action", baseUrl + "/" + id);
    $("#mdl-edita-papel").modal("show");

});

$(".btn-del-papel").on("click", function(){
    let id = $(this).data("id");
    let baseUrl = $("#mdl-cria-papel form").attr("action");
    $("#frm-deleta-papel").attr("action", baseUrl + "/" + id);
    $("#mdl-deleta-papel").modal("show");
});


///////////////////////////

$("#btn-am-cadastrar-usuario").on("click", function(){
    $("#mdl-cria-usuario").modal("show");
});

$(".btn-edit-usuario").on("click", function(){
    let id = $(this).data("id");
    let idPapel = $(this).data("idpapel");
    let email = $(this).data("email");
    let nome = $(this).parents("tr").find(".nome-usuario").html();
    let baseUrl = $("#mdl-cria-usuario form").attr("action");
    $("#frm-edita-usuario").attr("action", baseUrl + "/" + id);
    $("#inpt-edita-usuario-id").val(id);
    $("#inpt-edita-usuario-nome").val(nome);
    $("#inpt-edita-usuario-email").val(email);
    $('#slct-edita-usuario-papel option').removeAttr('selected');
    $('#slct-edita-usuario-papel option[value="'+idPapel+'"]').attr("selected", "selected");
    $("#mdl-edita-usuario").modal("show");
});

$(".btn-del-usuario").on("click", function(){
    let baseUrl = $("#mdl-cria-usuario form").attr("action");
    let id = $(this).data("id");
    $("#frm-deleta-usuario").attr("action", baseUrl + "/" + id);
    $("#mdl-deleta-usuario").modal("show");
    
});