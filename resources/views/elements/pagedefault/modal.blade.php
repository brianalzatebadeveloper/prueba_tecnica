<div class="modal_services" id="registers">
 	<div class="close_modal">
 		<a href="javascript:cerrarPlan();"><img src="{{ asset('img/close.png') }}" alt=""></a>
 	</div>
 	<div class="content_modal">
 		<div class="info_content_modal" style="background-image: url('{{ asset('img/content/IMG-CONT-1-3-6.jpg') }}');">

 			<div class="text_info_content_modal">
 				<h2>Registrate</h2>

 			</div>

 		</div>
 		<div class="content_form_modal">
 			<p id="textModal">Ingresa la información solicitada para crear tu usuario.</p>
 			<div class="message_form message_form_style_personal message_form_style_margin">
			 	<div id="alert2" class="alert" style="display:none;"></div>
			</div>

			{!! Form::open(['route' => 'page.membersform', 'method' => 'POST', 'id' => 'formContact1', 'onsubmit' => 'javascript: return validarRegisters(this);']) !!}

				<div class="item_input_form left_form">
					{!! Form::text('name', null, ['class' => 'input_form','placeholder' => 'Nombre Completo', 'id' => 'name1', 'onkeypress' => 'return soloLetrases(event);']) !!}
					<div class="content_icon">
						<span class="icon-user"></span>
					</div>
				</div>

				<div class="item_input_form right_form">
					{!! Form::email('email', null, ['class' => 'input_form', 'placeholder' => 'E-mail', 'id' => 'email1']) !!}
					<div class="content_icon_right">
						<span class="icon-envelop"></span>
					</div>
				</div>

				<div class="item_input_form left_form">
					{!!  Form::text('city', null, ['class' => 'input_form', 'placeholder' => 'Ciudad','id' => 'city1','onkeypress' => 'return soloLetrases(event);']) !!}
					<div class="content_icon">
						<span class="icon-map"></span>
					</div>
				</div>

				<div class="item_input_form right_form">
					{!! Form::password('password', ['class' => 'input_form', 'placeholder' => 'Contraseña', 'id' => 'password1']) !!}
					<div class="content_icon_right">
						<span class="icon-key"></span>
					</div>
				</div>


				<div class="text_informative">
				   <input type="checkbox" id="checkboxBtn1" onclick="habilitarbnt1();"><a href="#">Acepto políticas de tratamiento de datos .</a>
				   {!! Form::button('enviar', ['id' => 'enviar1', 'type' => 'submit']) !!}
				</div>


 			{!! Form::close(); !!}

 		</div>
 	</div>
 </div>

 <div class="modal_services" id="login">
 	<div class="close_modal">
 		<a href="javascript:cerrarPlan();"><img src="{{ asset('img/close.png') }}" alt=""></a>
 	</div>
 	<div class="content_modal">
 		<div class="info_content_modal" style="background-image: url('{{ asset('img/content/IMG-CONT-1-3-6.jpg') }}');">

 			<div class="text_info_content_modal">
 				<h2>Inicia Sesión</h2>
 			</div>

 		</div>
 		<div class="content_form_modal">
 			<p id="textModal">Ingresa la información solicitada.</p>
 			<div class="message_form message_form_style_personal message_form_style_margin">
			 	<div id="alert3" class="alert" style="display:none;"></div>
			</div>

			{!! Form::open(['route' => 'members.login', 'method' => 'POST', 'id' => 'formContact2', 'onsubmit' => 'javascript: return validarLogin(this);']) !!}

				<div class="item_input_form left_form">
					{!! Form::text('email', null, ['class' => 'input_form','placeholder' => 'Email', 'id' => 'email2','data-field-form' => 'email2']) !!}
					<div class="content_icon">
						<span class="icon-user"></span>
					</div>
				</div>

				<div class="item_input_form right_form">
					{!! Form::password('password', ['class' => 'input_form', 'placeholder' => 'Contraseña', 'id' => 'password2']) !!}
					<div class="content_icon_right">
						<span class="icon-key"></span>
					</div>
				</div>

				<div class="text_informative" style="text-align: center;">

				   {!! Form::button('enviar', ['id' => 'enviar2', 'type' => 'submit','style' => 'display:inline-block; margin-top: 0px;']) !!}
				</div>


 			{!! Form::close(); !!}

 		</div>
 	</div>
 </div>
