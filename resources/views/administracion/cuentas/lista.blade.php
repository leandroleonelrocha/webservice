<!DOCTYPE html>
<html>
    <head>
		<title>GECO -- Administraci&oacute;n</title>
		<link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<!-- FontAwesome 4.3.0 -->
		<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/fonts.css')}}" rel="stylesheet" type="text/css" />
		
		<!-- GECO Styles -->
		<link href="{{asset('css/geco-styles.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div>
            <div>
                <div>Listado de Cuentas</div>
                <div>
                	<table>
                		<thead>
	                		<tr>
								<th>Usuario</th>
								<th>Rol</th>
								<th>Habilitar</th>
							</tr>
						</thead>
						<tbody>
		                    @foreach($cuentas as $cuenta)
		                    	<tr>
		                    		<td>{{$cuenta->usuario}}</td>
		                    		<td>{{$cuenta->Rol->rol}}</td>
		                    		 <td>
				                  <a class="activar" data-activar="{{route('administracion.cuentas_habilitar',$cuenta->id)}}}" data-id="{{$cuenta->id}}">
				                  <?php if($cuenta->habilitado == 1){ ?>
									<i class="btn btn-green fa fa-thumbs-o-up" title="Habilitado"></i>
									<?php }else{ ?>
									<i class="btn btn-red fa fa-thumbs-o-down" title="Inhabilitado"></i>
									<?php } ?>
				                  </a>
				                </td>
		                    	</tr>
		                    @endforeach
						</tbody>
                	</table>
                </div>           
            </div>
        </div>
        <!-- jQuery 2.1.4 -->
		<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
		<script src="{{asset('js/functions.js')}}"></script>
    </body>
</html>
