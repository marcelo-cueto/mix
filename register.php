<?php require_once 'header_web.php'; ?>



	<div id="colorlib-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-push-1 animate-box" style='margin-top:1%'>


				<div class="col-md-9 animate-box center" >
					<h3>Registrese gratis</h3>
					<form id='register' action="#" class='needs-validation' method='post' oninput='passR.setCustomValidity(passR.value != pass.value ? "Las contraseñas no coinciden." : "")'>
						<div class="row form-group">
							<div class="col-md-6">
								<!-- <label for="fname">First Name</label> -->
								<input type="text" id="name" name='name' class="form-control" placeholder="Ingrese su nombre aqui..." required>
							</div>
							<div class="col-md-6">
								<!-- <label for="lname">Last Name</label> -->
								<input type="text" id="apellido" class="form-control" name='apellido' placeholder="Ingrese su apellido aqui..." required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="email" id="email" name='email'  class="form-control" placeholder="Ingrese su email aqui..." required>
							</div>
						</div>
						<div class="row form-group">

								<div class="col-md-12">
									<!-- <label for="email">Email</label> -->
									<input type="tel" id="tel" name='tel'  class="form-control" placeholder="Ingrese su tefono aqui...">
								</div>
							</div>
							<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="password" id="pass" name='pass'  class="form-control" placeholder="Contraseña" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">passr</label> -->
								<input type="password" id="passR" name='passR'  class="form-control" placeholder="Contraseña" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="profesion">Profesion</label>
								<select name='profesion'class="form-control" name="profesion" required>
									<option value="Contador Publico">Contador Publico</option>

								</select>
							</div>
						</div>
						<label for="especializacion">Especialista en:</label>
						<div class="row form-group">

							<div class="col-md-6">

								<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="exampleCheck1" name='sueldos' >
							    <label class="form-check-label" for="sueldos"style="margin-left: 2%">SUELDOS</label>
							  </div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" name='impuestos' >
									<label class="form-check-label" for="impuestos"style="margin-left: 2%">IMPUESTOS</label>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" name='sociedad_pyme' >
									<label class="form-check-label" for="sociedad_pyme"style="margin-left: 2%">CONSTITUCION DE SOCIEDADES</label>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" name='contabilidad' >
									<label class="form-check-label" for="sociedad_pyme"style="margin-left: 2%">CONTABILIDAD - BALANCES</label>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" name='certificaciones' >
									<label class="form-check-label" for="sociedad_pyme"style="margin-left: 2%">CERTIFICACIONES</label>
								</div>
								</div>
								<div class="col-md-6">
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" name='monotributo' >
									<label class="form-check-label" for="monotributo_autonomos"style="margin-left: 2%">MONOTRIBUTO</label>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" name='autonomos' >
									<label class="form-check-label" for="monotributo_autonomos"style="margin-left: 2%">AUTONOMOS</label>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" name='gestion' >
									<label class="form-check-label" for="impuestos"style="margin-left: 2%">GESTION</label>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" name='judiciales' >
									<label class="form-check-label" for="impuestos"style="margin-left: 2%">JUDICIALES Y PERICIAS</label>
								</div>
								</div>

						</div>
						<div class="row form-group">

								<div class="col-md-12">

									<input type="text" id="otras" name='otras'  class="form-control" placeholder="Otras...">
								</div>
							</div>
						<div class="row form-group">

								<div class="col-md-12">
									<!-- <label for="email">Email</label> -->
									<input type="text" id="matricula" name='matricula'  class="form-control" placeholder="Ingrese su matricula aqui..." >
								</div>
							</div>
							<div class="row form-group">

									<div class="col-md-12">
										<!-- <label for="email">Email</label> -->
										<input type="text" id="conocio" name='conocio'  class="form-control" placeholder="Como nos conocio?" required >
									</div>
								</div>
								<div class="row form-group">

										<div class="col-md-12">
											<!-- <label for="email">Email</label> -->
											<textarea name="name" rows="8" cols="88	" placeholder="Comentarios"></textarea>
										</div>
									</div>
						<div class="form-group">
							<input id='pago'type="button" value="Enviar y suscribirme acá" class="btn btn-success" >
							<button type="submit" class="btn btn-primary" name="button" >Enviar y solicitar contacto</button>
						</div>

					</form>
					<div class="mensaje">

	        </div>
				</div>
			</div>

		</div>
	</div>
	<div id="map" class="colorlib-map"></div>

	<div id="colorlib-consult">
		<div class="video colorlib-video" style="background-image: url(images/video.jpg);" data-stellar-background-ratio="0.5">
		</div>
		<div class="choose choose-form animate-box">
			<div class="colorlib-heading">


<?php require_once 'footer_web.php'; ?>
<script type="text/javascript">
$(document).ready(function() {

	guardar();
	crs();
})
var crs=function(){
	$('#pago').on('click', function(){
		mobbex();
	})
}

var guardar=function(){
	$('#register').on('submit', function(e){
		e.preventDefault();
		var frm=$('#register').serialize();

		$.ajax({
			method:'POST',
			url: 'ajax/register.php',
			data: frm
		}).done(function(info){

			mostrar_mensaje(info);
			limpiar_datos();
		})
	})
}
var limpiar_datos = function(){

	$("#register #name").val("");
	$("#register #apellido").val("");
	
	$("#register #tel").val("");
	$("#register #email").val("");
	$("#register #conocio").val("");
	$("#register #exampleCheck1").prop("checked", false);
	$("#register #coment").val("");
	$("#register #pass").val("");
	$("#register #passR").val("");
	$("#register #matricula").val("");
	$("#register #otras").val("");
}
var mostrar_mensaje = function(informacion){

	switch (informacion) {
		case '1':
			var texto = "<strong>Bien!</strong> Se ha registrado con exito.";
			var color = "#379911";
			break;
		case '2':
			var texto = "<strong>Error</strong>, no se ejecutó la consulta.";
			var color = "#C9302C";
			break;

		case '3':
			var texto = "<strong>Atencion!</strong> el email ya se habia registrado con anterioridad.";
			var color = "#C9302C";

			break;
		case '4':
			var texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
			var color = "#ddb11d";
			break;

	}


	$(".mensaje").html( texto ).css({"color": color, 'font-size': '200%'});


}
var mobbex=function(){
	var data = JSON.stringify({
  "total": 500,
  "currency": "ARS",
  "type": "dynamic",
  "total": "Suscripcion Enlace Profesional",
	"description":"Suscripcion Enlace Profesional",
	"interval": '1m',
	"trial":'7d',
	"limit":'6m',
  "return_url": "register.php",

});

var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === 4) {
    console.log(this.responseText);
  }
});

xhr.open("POST", "https://api.mobbex.com/p/subscriptions");
xhr.setRequestHeader("x-api-key", "L7buJqqodxsKdU11pIayTtUR1UbQsGgypIfqI4cT");
xhr.setRequestHeader("x-access-token", "d31f0721-2f85-44e7-bcc6-15e19d1a53cc");
xhr.setRequestHeader("x-lang", "es");
xhr.setRequestHeader("Content-Type", "application/json");
xhr.setRequestHeader("cache-control", "no-cache");


xhr.send(data);
console.log(xhr);
}
</script>
