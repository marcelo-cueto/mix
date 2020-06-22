<?php require_once 'header_web.php'; ?>



	<div id="colorlib-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-push-1 animate-box" style='margin-top:1%'>


				<div class="col-md-9 animate-box center" >
					<h3>Busco Profesional</h3>
					<form id='register' action="#" class='needs-validation' method='post' >
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
									<input type="text" id="dir" name='dir'  class="form-control" placeholder="Ingrese su dirección aqui...">
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
								<label for="profesion">Profesional</label>
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
									<!-- <label for="email">Email</label> -->
									<textarea id='coment' name="coment" rows="8" cols="80" placeholder="Deje su comentario aqui..."></textarea>
								</div>
							</div>
						<div class="form-group">
							<input type="submit" value="Registrarme" class="btn btn-primary">
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
	limpiar_datos()
	guardar();

})

var guardar=function(){
	$('#register').on('submit', function(e){
		e.preventDefault();
		var frm=$('#register').serialize();

		$.ajax({
			method:'POST',
			url: 'ajax/search.php',
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
	$("#register #dir").val("");
	$("#register #tel").val("");
	$("#register #email").val("");
	
	$("#register #exampleCheck1").prop("checked", false);
	$("#register #coment").val("");

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

</script>
