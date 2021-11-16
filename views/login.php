<?php require_once "Helpers/inicio-html.php" ?>;

<?php if(isset($_SESSION['mensagem'])):?>
	<div class="<?=$_SESSION['status']?>" role="alert">
		<?= $_SESSION['mensagem'] ?>
		<?php unset($_SESSION['mensagem']); ?>
	</div>	
<?php endif ;?>

<div class="alert alert-danger" id="alerta_campo_vazio" style="display: none;">
	<p> </p>
</div>

<form class="row g-3" action="/processaLogin" method="POST">
  <div class="col-md-6 col-xs-4">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="input_email" name="email">
  </div>
  <div class="col-md-6 col-xs-4">
    <label for="senha" class="form-label">Password</label>
    <input type="password" class="form-control" id="input_senha" name="senha">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary" id="submit" onclick="return validaFunc()" >Sign in</button>

  </div>                                                        
</form>

<?php require_once "Helpers/fim-html.php" ?>;

<script> 

var submit = document.getElementById("submit");
    var inputs = document.querySelectorAll("[id*=input]");
  
    function validaFunc(){
  
      var l = new ClassValidaLogin;
      
      if(l.valida() == false){
        return false
      }else{
        return true;
      }
    }
  
    class VerificaInputVazios{
  
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
  }
    class ClassValidaLogin extends VerificaInputVazios{
  
      valida(){
        var inputs = document.querySelectorAll("[id*='input']");
        var boxAlerta = document.getElementById("alerta_campo_vazio");
        var res = this.validaInputsVazios(inputs, boxAlerta);
        return res;
      }
    }
  

</script>
<a href="/cadastrar">Cadastrar </a>
