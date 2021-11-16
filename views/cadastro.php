<?php require_once "Helpers/inicio-html.php"; ?>

<?php if(isset($_SESSION['mensagem'])):?>
	<div class="<?=$_SESSION['status']?>" role="alert">
		<?= $_SESSION['mensagem'] ?>
		<?php unset($_SESSION['mensagem']); ?>
	</div>	
<?php endif ?>

<div class="alert alert-danger" id="alerta_campo_vazio" style="display: none;">
	<p> </p>
</div>

<form action="/processaCadastroController" method="POST" id="form">

  <div class="mb-3">
    <label for="input_nome" class="form-label">Nome:</label>
    <input type="text" class="form-control" name="nome" id="input_nome" autocomplete="on" 
	value="<?= isset($_SESSION['dadosForm']) ? $_SESSION['dadosForm'][0] : null ?>">
  </div>


  <div class="mb-3">
    <label for="input_cpf" class="form-label">CPF:</label>
    <input type="number" class="form-control" name="cpf" id="input_cpf" autocomplete="on"
	value="<?= isset($_SESSION['dadosForm']) ? $_SESSION['dadosForm'][1] : null ?>">
	
  </div>
  
  	<div>
        <label for="input_data_nascimento">Data de nascimento:</label>
        <input type="date" name="data_nascimento" id="input_data_nascimento" autocomplete="on"
		value="<?= isset($_SESSION['dadosForm']) ? $_SESSION['dadosForm'][2] : null ?>">
    </div>

  <div class="mb-3">
    <label for="input_email" class="form-label"  >Email:</label>
    <input type="email" name="email" class="form-control" id="input_email" aria-describedby="emailHelp"
	value="<?= isset($_SESSION['dadosForm']) ? $_SESSION['dadosForm'][3] : null ?>">
    <div id="emailHelp" class="form-text">Ensira o seu melhor email :D</div>
  </div>


  <div class="mb-3">
    <label for="input_senha" class="form-label">Senha:</label>
    <input type="password" class="form-control" minlength="5" name="senha" id="input_senha" autocomplete="on">
  </div>

  <div class="mb-3">
    <label for="input_senha_confirmar" class="form-label">Confirmar a senha:</label>
    <input type="password" class="form-control" minlength="5" name="senha_confirmar" id="input_senha_confirmar" autocomplete="on">
  </div>

  <button type="submit" class="btn btn-success" id="submit" onclick="return valida()"> Cadastrar </button>
</form>
<a href="/login"> Fazer login </a>


<?php if(isset($_SESSION['dadosForm'])){ unset($_SESSION['dadosForm']); } ?>


<script>

	function valida(){
	
		var v = new ValidarInputs();
		var p = document.getElementById("alerta_campo_vazio").children[0].innerText;

		if(p === ""){
			return true;
		}else{
			return false;
		}
	};

class ValidarInputs{
	constructor(){
		var inputs = document.querySelectorAll('[id*=input]');
		var boxAlerta = document.getElementById("alerta_campo_vazio")
		var resInput = this.validaInputsVazios(inputs, boxAlerta);
		if(resInput === true){
			this.validaSenhas(boxAlerta, inputs);
		}
	}
	validaInputsVazios(inputs, boxAlerta){
			var resultado;
			var inputsArray = Array.from(inputs);
			inputsArray.forEach((input, index)=> {
				if(input.value === ""){
				inputsArray[index].style.borderColor = "red";
				boxAlerta.style.display = "block";
				boxAlerta.children[0].innerText = "Alguns campos estão vazios :(";
				resultado = false;
				
			}else{
				inputsArray[index].style.borderColor = "black";
				boxAlerta.style.display = "none";
				resultado = true;	
			}
		})
			return resultado;
		}
	
	validaSenhas(boxAlerta, inputs){
			var inputsArray = Array.from(inputs);
		
			if(inputs[4].value !== inputs[5].value){
				boxAlerta.children[0].innerText = "As senhas precisams ser as mesmas :(";
				boxAlerta.style.display = "block";
				inputs[4].style.borderColor = "red";
				inputs[5].style.borderColor = "red";
			}
				boxAlerta.children[0].innerText = "";
		}
	};
</script>
<?php require_once "Helpers/fim-html.php"; ?>