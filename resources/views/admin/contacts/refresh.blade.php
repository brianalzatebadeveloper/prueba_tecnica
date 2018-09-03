@if(!empty($contact))

	<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">{{ count($contact) }}</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                  @foreach($contact as $key => $item)

                  	<li>
                     
                        <a><span class="image"><img src="{{ asset('img/user-ico.png') }}" alt="Profile Image" /></span>
                        	<span>
                        	  <span>{!! $item->name !!} </span>
                        	  <span class="time">
                        	   {{ $item->created_at->diffForHumans() }}
                        	  </span>
                        	</span>
                        	<span class="message" style="text-align: center;">
                        	  <a href="{{ route('contacts.show',$item->id) }}" style="text-align:center;color:#1ABB9C;font-weight:bold;">Ver Contacto</a><a href=""></a>
                        	</span></a>
                      
                    </li>
                  
                  <?php endforeach; ?>
                    <li>
                      <div class="text-center">
                        <a href="{{ route('contacts.index') }}">
                          <strong>Ver todos los usuarios </strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>

	
@else

			<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">0</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <div class="text-center">
                        <a href="{{ route('contacts.index') }}">
                          <strong>Ver todos los usuarios </strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
@endif