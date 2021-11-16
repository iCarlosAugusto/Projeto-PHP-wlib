<?php require_once "Helpers/inicio-html.php";?>

<?php if(isset($_SESSION['mensagem'])):?>
	<div class="<?=$_SESSION['status']?>" role="alert">
		<?= $_SESSION['mensagem'] ?>
		<?php unset($_SESSION['mensagem']); ?>
	</div>	
<?php endif ?>

<div class="alert alert-danger" role="alert" style="display: none;" id="alertaSenhasDiferentes">
  <p>As novas senhas não são iguais.</p>
</div>

<form action="/processaAlterarSenha" method="POST">
	<input class="form-control mb-3" type="password"  name = "senhaAtual" placeholder="Senha atual" aria-label="default input example" required>
	<input class="form-control mb-3" id="senha_nova" minlength="5" name = "senhaNova" type="password"  placeholder="Nova senha" aria-label="default input example"  required>
	<input class="form-control mb-3" id="senha_nova_confirmar" minlength="5" type="password" name = "senhaNovaConfirmar" placeholder="Confirmar nova senha" aria-label="default input example"  required>
	
	<button type="submit" class="btn btn-primary" onclick="return verificaCampos()">Alterar</button>
</form>

<script>
	function verificaCampos(){
		console.log("verificando....");
		var senha_nova = document.getElementById("senha_nova");
		var senha_nova_confirmar = document.getElementById("senha_nova_confirmar");
		if(senha_nova.value !== senha_nova_confirmar.value){
			senha_nova.style.borderColor = "red";
			senha_nova_confirmar.style.borderColor = "red";
			document.getElementById("alertaSenhasDiferentes").style.display= "block";	
			return false
		}
			senha_nova.style.borderColor = "black";
			senha_nova_confirmar.style.borderColor = "black";
			document.getElementById("alertaSenhasDiferentes").style.display= "none";	
		return true;
	}
</script>
	
	
<?php require_once "Helpers/fim-html.php";?>
