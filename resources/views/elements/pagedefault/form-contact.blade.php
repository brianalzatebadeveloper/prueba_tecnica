<section class="content_contact_form" id="contactenos">
	<div class="text_content_contact">
		{!! $contentForm[0]['text'] !!}

		 <div class="message_form message_form_style_personal">
		 	@include('elements.error.error')
		 	@include('flash::message')
		 	<div id="alert1" class="alert" style="display:none;"></div>
		</div>

	</div>

	<div class="form_contact_section">

		 	{!! Form::open(['route' => 'page.formcontact', 'method' => 'POST', 'id' => 'contactMessage','onsubmit' => 'javascript: return validarContact(this);']) !!}

 				<input type="hidden" name="section" value="{{ $seo['meta_title']}}">
				<div class="item_input_form left_form">
					{!! Form::text('name', null, ['class' => 'input_form','placeholder' => 'Nombre Completo', 'id' => 'name', 'onkeypress' => 'return soloLetrases(event);','data-field-form' => 'name']) !!}
					<div class="content_icon">
						<span class="icon-user"></span>
					</div>
				</div>

				<div class="item_input_form right_form">
					{!! Form::email('email', null, ['class' => 'input_form', 'placeholder' => 'E-mail', 'id' => 'email']) !!}
					<div class="content_icon_right">
						<span class="icon-envelop"></span>
					</div>
				</div>

				<div class="item_input_form left_form">
					{!!  Form::number('phone', null, ['class' => 'input_form', 'placeholder' => 'Teléfono o Celular','id' => 'phone','onkeypress' => 'return justNumbers(event);']) !!}
					<div class="content_icon">
						<span class="icon-phone"></span>
					</div>
				</div>

				<div class="item_input_form right_form">
					{!! Form::text('city', null, ['class' => 'input_form', 'placeholder' => 'Ciudad', 'id' => 'city','onkeypress' =>'return soloLetrases(event);','data-field-form' => 'city']) !!}
					<div class="content_icon_right">
						<span class="icon-map"></span>
					</div>
				</div>

				<div class="item_input_textarea_form">
					{!! Form::textarea('message', null, ['placeholder' => 'Mensaje', 'id' => 'message', 'rows' => '5'])!!}
					<div class="content_icon_textarea">
						<span class="icon-compass"></span>
					</div>
				</div>

				<div class="text_informative">
				   <input type="checkbox" id="checkboxBtn" onclick="habilitarbnt();"><a href="#">Acepto políticas de tratamiento de datos .</a>
				   {!! Form::button('Enviar', ['id' => 'enviar', 'type' => 'submit']) !!}
				</div>


 			{!! Form::close(); !!}


		</div>
</section>


