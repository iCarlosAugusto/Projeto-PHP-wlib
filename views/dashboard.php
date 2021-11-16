<?php require_once "Helpers/inicio-html.php";?>
	
	<p>Olá, <b><?=$_SESSION['dados']['nome']?></b>!</p>

	<?php if(isset($_SESSION['mensagem'])):?>
		<div class="<?=$_SESSION['status']?>" role="alert">
			<?= $_SESSION['mensagem'] ?>
			<?php unset($_SESSION['mensagem']); ?>
		</div>	
	<?php endif ?>
	
	<table class="table">
  <thead>
    <tr>
	 
	  <th scope="col">Nome</th>
	  <th scope="col">Email</th>
	  <th scope="col">CPF</th>     
      <th scope="col">Data de nascimento</th>
	  <th scope="col">Senha</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      	<td> <?= $_SESSION['dados']['nome'] ?> </td>
      	<td> <?= $_SESSION['dados']['email'] ?> </td>
		<td> <?= $_SESSION['dados']['cpf'] ?> </td>
		<td> <?= $_SESSION['dados']['data_nascimento'] ?> </td>
		<td><a href="dashboard/alterarSenha">Alterar senha</a></td>

    </tr>
  </tbody>
</table>
<a href="/logout">Logout</a>

<?php require_once "Helpers/fim-html.php";?>
