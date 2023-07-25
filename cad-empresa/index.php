<link rel="stylesheet">
<div class="container">
<div class="d-flex justify-content-center" style="left: -9%;">
<p class="titulo">Cadastrar Empresa</p>
</div>
<form method="POST" class="my-login-validation" novalidate="">

<!-- {{ FormularioSimples }} -->
<div class="form-group mt-4">
<label for="id_nome">Nome da Empresa</label>
<input id="id_nome" type="text" class="form-control" name="nome" required autofocus>
</div>
<div class="form-group mt-3">
<label for="id_telefone">Contato da Empresa</label>
<input id="id_telefone" type="text" class="form-control" name="telefone" required autofocus>
</div>
<div class="form-group mt-3">
<label for="id_email">E-Mail</label>
<input id="id_email" type="email" class="form-control" name="email" required>
</div>
<div class="form-group mt-3">
<label for="id_cnpj">CNPJ da Empresa</label>
<input id="id_cnpj" type="text" class="form-control" name="cnpj" required>
</div>
<div class="form-group mt-3">
<label for="id_cep">CEP</label>
<input id="id_cep" type="text" class="form-control" name="cep" required autofocus>
</div>
<div class="form-group mt-3">

</div>
<div class="form-group mt-3">
<label for="id_estado">Estado</label>
<input id="id_estado" type="text" class="form-control" name="estado" required autofocus>
</div>
<div class="form-group mt-3">
<label for="id_cidade">Cidade</label>
<input id="id_cidade" type="text" class="form-control" name="cidade" required autofocus>
</div>
<div class="form-group mt-3">
<label for="id_logradouro">Logradouro</label>
<input id="id_logradouro" type="text" class="form-control" name="logradouro" required autofocus>
</div>
<div class="form-group mt-3">
<label for="id_bairro">Bairro</label>
<input id="id_bairro" type="text" class="form-control" name="bairro" required autofocus>
</div>
<br>
<div class="d-flex justify-content-center">
<button class="btn btn-outline-primary rounded-pill" id="botao" type="submit">Cadastrar</button>
</div>
</form>
</div>


<script>
$( document ).ready(function() {
$("#id_cep").mask("00000-000");
$('#id_cnpj').mask('00.000.000/0000-00', {reverse: true});
$('#id_telefone').mask('(00) 0000-0000');
$("#id_cep").focusout(function(){
//Início do Comando AJAX
$.ajax({
//O campo URL diz o caminho de onde virá os dados
//É importante concatenar o valor digitado no CEP
url: 'https://viacep.com.br/ws/'+$(this).val().replace(".","").replace("-","")+'/json/unicode/',
//Aqui você deve preencher o tipo de dados que será lido,
//no caso, estamos lendo JSON.
dataType: 'json',
//SUCESS é referente a função que será executada caso
//ele consiga ler a fonte de dados com sucesso.
//O parâmetro dentro da função se refere ao nome da variável
//que você vai dar para ler esse objeto.
success: function(resposta){
//Agora basta definir os valores que você deseja preencher
//automaticamente nos campos acima.
if (resposta.erro) {
$("#id_cep").removeClass('valid');
$("#id_cep").addClass('invalid');
}
$("#id_logradouro").val(resposta.logradouro);
$("#id_bairro").val(resposta.bairro);
$("#id_cidade").val(resposta.localidade);
$("#id_estado").val(resposta.uf);

//Vamos incluir para que o Número seja focado automaticamente
//melhorando a experiência do usuário

$("#id_numero").focus();
}
});
});
});
</script>