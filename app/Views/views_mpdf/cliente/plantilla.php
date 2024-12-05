<?php $db = \Config\Database::connect(); ?>
<?php
		$certificado->cer_fecha_publicacion = !empty($certificado->cer_fecha_publicacion) ? $certificado->cer_fecha_publicacion : date('Y-m-d H:i:s');
		
		$sql_modificaciones = "SELECT count(*) as count FROM `view_auditoria_cer` WHERE `informe_nro` = $certificado->certificado_nro AND `fecha_modificacion` > '$certificado->cer_fecha_publicacion'";
		$modificaciones = $db->query($sql_modificaciones)->getResult();
		$count_mod = $modificaciones[0]->count;
		
		$fechasUtiles = procesar_registro_fetch('fecha_vida_util', 'id_detalle_muestreo', $certificado->id_muestreo_detalle);
		if(!empty($fechasUtiles)){
			$fecha_aux = [];
			foreach ($fechasUtiles as $key => $fecha)
				array_push($fecha_aux, $fecha->fecha);
			$fecha_analisis_aux = implode(', ', $fecha_aux);
		}
?>
<body style="display: flex; justify-content: center;">
	<div style="width:100%" class="container">
		<div class="container_2">
			<table style="width: 100%">
				<thead>
					<tr class="amc-centrado">
						<td colspan="3">
							<div id="amc-header">
								<strong> INFORME DE RESULTADOS No. <?= $certificado->certificado_nro ?><?= $type_informe == 1 ? '-'.$type_informe:'' ?><?= $count_mod > 0 ? "-M$count_mod":'' ?> </strong>
							</div>
						</td>
					</tr> 
				</thead>
			</table>
			
			<br>
			<table class="table cliente" width="100%" >
				<?php
					$certificacion = procesar_registro_fetch('certificacion', 'certificado_nro', $certificado->certificado_nro);
					$conteo_productos = 0;
					$contador = 1;
					$muestra = procesar_registro_fetch('muestreo', 'id_muestreo', $certificado->id_muestreo);
					$detalle = procesar_registro_fetch('muestreo_detalle', 'id_muestra_detalle', $certificacion[0]->id_muestreo_detalle);
				?>
				<tbody>
					<tr>
						<td><b><sup>3</sup> EMPRESA</b></td>
						<td class="analisis"><?= $cliente->name ?></td>
						<td><b><sup>3</sup> DIRECCIÓN</b></td>
						<td><?= empty($muestra[0]->mue_subtitulo) ? $cliente->use_direccion : $muestra[0]->mue_subtitulo ?></td>
					</tr>
					<tr>
						<td><b><sup>3</sup> ITEM DE ENSAYO</b></td>
						<td><?= $detalle[0]->mue_identificacion ?></td>
						<td><b><sup>3</sup> CANTIDAD:</b></td>
						<td><?= $detalle[0]->mue_cantidad ?></td>
					</tr>
					<tr>
						<td><b><sup>3</sup> FECHA DE PRODUCCIÓN</b></td>
						<td><?= $detalle[0]->mue_fecha_produccion ?></td>
						<td><b><sup>3</sup> FECHA VENCIMIENTO</b></td>
						<td><?= $detalle[0]->mue_fecha_vencimiento ?></td>
					</tr>
					<tr>
						<td><b><sup>3</sup> LOTE</b></td>
						<td><?= $detalle[0]->mue_lote ?></td>
						<td><b>EMPAQUE</b></td>
						<td><?= $detalle[0]->mue_empaque ?></td>                  
					</tr>
					<tr>
						<td><b>CODIGO INTERNO LAB</b></td>
						<td><?= construye_codigo_amc($detalle[0]->id_muestra_detalle) ?></td>
						<td><b>ITEM RECOLECTADO POR</b></td>
						<td><?= $detalle[0]->mue_procedencia  ?></td>
					</tr>
					<tr>
						<td><b> TEMPERATURA (°C) RECEPCIÓN </b></td>
						<td><?= $detalle[0]->mue_temperatura_laboratorio ?></td>
						<td><b>TEMPERATURA (°C) INGRESO LAB</b></td>
						<td><?= $detalle[0]->mue_temperatura_muestreo ?></td>
					</tr>
					<tr>
						<td><b> FECHA INGRESO </b></td>
						<td><?= recortar_fecha($muestreo->mue_fecha_muestreo,1) ?></td>
						<td><b> FECHA(S) DE ANALISIS </b></td>
						<td class="analisis">
						    <?php if(!empty($fechasUtiles)): ?>
								<?= $fecha_analisis_aux ?>
							<?php else: ?>
								<?= $certificacion[0]->cer_fecha_analisis != '0000-00-00 00:00:00' ? recortar_fecha($certificacion[0]->cer_fecha_analisis, 1) : recortar_fecha($muestra[0]->mue_fecha_muestreo, 1) ?>
							<?php endif ?>
						</td>
					</tr>
					<tr>
						<td><b> CONDICIONES DE RECEPCIÓN DEL ITEM DE ENSAYO </b></td>
						<td><?= $detalle[0]->mue_condiciones_recibe ?></td>
						<td><b>FECHA EMISIÓN DEL INFORME</b></td>
						<td><?= $type_informe == 1 ? recortar_fecha($certificacion[0]->cer_fecha_preinforme, 1):recortar_fecha($certificacion[0]->cer_fecha_informe, 1) ?></td>
					</tr>
					<tr>
						<td><b> OBSERVACIÓN </b></td>
						<td colspan="3"><?= $detalle[0]->mue_adicional ?></td>
					</tr>
				</tbody>
			</table>
			<?php
	
				// $texto_incertidumbre = "";
				// if($aux_incertidumbre == 1){
				// 	$texto_incertidumbre = "<br><b> µ </b> = incertidumbre expandida al valor reportado con un factor de cobertura de k=2, para un intervalo de confianza de aproximadamente el 95%";
				// }
			?>
			<div class="amc-centrado text-mayus text-title-asb"  width="100%">
				<?php
					if($type_informe == 1){
						$id_tipo = $certificado->id_tipo_analisis_primer_informe != 0 ? $certificado->id_tipo_analisis_primer_informe : $certificado->id_tipo_analisis_informe_final;
						$analisis = procesar_registro_fetch('muestra_tipo_analisis', 'id_muestra_tipo_analsis', $id_tipo);
					}else{
						$analisis = procesar_registro_fetch('muestra_tipo_analisis', 'id_muestra_tipo_analsis', $certificado->id_tipo_analisis_informe_final);
					}
				?>
				<strong>ANÁLISIS <?= $analisis[0]->mue_nombre ?></strong><br>
			</div>
			<table class="table" width="100%">
				<thead>
					<tr>
						<th><b>ENSAYO</b></th>
						<?php if(!empty($fechasUtiles)): ?>
							<th><b>UNIDADES</b></th>
							<?php foreach($fechasUtiles as $fecha): ?>
								<th><b>DÍA <?= $fecha->dia ?> <br> RESULTADO</b></th>
							<?php endforeach ?>
						<?php else: ?>
							<th><b>RESULTADO</b></th>
							<th><b>UNIDADES</b></th>
							<th><b>INCERTIDUMBRE</b></th>
						<?php endif ?>
						<th><b>ESPECIFICACIÓN</b></th>
						<th><b>TÉCNICA/MÉTODO</b></th>
						<th><b>CONCEPTO <sup>1</sup></b></th>
					</tr>
				</thead>
				<tbody>
	
				<?php foreach ($query_ensayos as $fila_ensayos): ?>
	
					<?php
							$sql_ensayosWD = "SELECT 
										 DISTINCT e.resultado_mensaje
										,e.id_regla
										,m.mue_unidad_medida
									FROM certificacion c, muestreo_detalle m, ensayo_vs_muestra e, ensayo p
								where c.id_muestreo_detalle=m.id_muestra_detalle
								and m.id_muestra_detalle=e.id_muestra
								and e.id_ensayo=p.id_ensayo
								and c.certificado_nro=$certificado->certificado_nro and p.id_ensayo = $fila_ensayos->id_ensayo limit 1"; // group by e.id_ensayo
							$query_ensayosWD = $db->query($sql_ensayosWD)->getResult();
							$fila_ensayosWD = $query_ensayosWD[0];
	
							$parametro = procesar_registro_fetch('parametro', 'id_parametro', $fila_ensayos->id_parametro);
							if($fila_ensayos->fecha_aplica_referencia < $fecha_analisis)
								 $aux_descripcion_ensayo = ($fila_ensayos->refe_bibl) ? $fila_ensayos->refe_bibl : $parametro[0]->par_descripcion;
							else
								 $aux_descripcion_ensayo = $parametro[0]->par_descripcion;
							
							$aux_descripcion_ensayo = !empty($aux_descripcion_ensayo) ? $aux_descripcion_ensayo : $parametro[0]->par_nombre;
						?>
						<tr>
						    <?php if($aux_descripcion_ensayo[0] == 2): ?>
								<?php
									$aux_descripcion_ensayo[0] = ' ';
									$aux_descripcion_ensayo = "<sup>2</sup> {$aux_descripcion_ensayo}";
								?>
								<td class="analisis_2"><?= $aux_descripcion_ensayo ?></td>
							<?php else: ?>
								<td class="analisis_2"><?= $aux_descripcion_ensayo ?></td>
							<?php endif ?>
							
							
							
							<?php
								//unidades
								if($fila_ensayosWD->mue_unidad_medida == 'solida'){
									$unidad = $parametro[0]->unidad_solida;
								}elseif($fila_ensayosWD->mue_unidad_medida == 'liquida'){
									$unidad = $parametro[0]->unidad_liquida;
								}else {
									$unidad = 'No aplica';
								}
								if (empty($unidad))
									$unidad = 'No aplica';
								//incertidumbre
								$incertidumbre = ($parametro[0]->incertidumbre) ? $parametro[0]->incertidumbre:'No aplica';
								//validamos que tenga una incertidumbre
								// if($aux_incertidumbre == 0){
								// 	if($incertidumbre <> 'No aplica'){
								// 		$aux_incertidumbre = 1;
								// 	}
								// }
								?>
							<?php if(!empty($fechasUtiles)): ?>
							<td><?= $unidad ?></td>
								<?php foreach($fechasUtiles as $fecha): ?>
									<?php foreach($certificacion as $fila_analisis): ?>
										<?php
											$sql_ensayos2 = "
												SELECT e.resultado_mensaje, m.id_tipo_analisis, e.id_ensayo_vs_muestra
												,e.campo_primer_informe
												FROM certificacion c, muestreo_detalle m, ensayo_vs_muestra e, ensayo p
												WHERE 
												c.id_muestreo_detalle=m.id_muestra_detalle
												AND m.id_muestra_detalle=e.id_muestra
												AND e.id_ensayo=p.id_ensayo
												AND c.id_certificacion=$fila_analisis->id_certificacion 
												AND e.id_ensayo=$fila_ensayos->id_ensayo
												AND e.id_fecha_vida_util=$fecha->id";//
												$query_ensayos2 = $db->query($sql_ensayos2)->getResult();
												$fila_ensayos2 = $query_ensayos2[0];
										?>
										<?php if($fila_ensayos2->campo_primer_informe == $campo_primer_informe): ?>
											<?php if (!isset($fila_ensayos2->resultado_mensaje) ):?>
												<?php if($fila_ensayos2->resultado_mensaje == '0'):?>
													<td>0</td>
												<?php else:?>
													<td>Pendientes</td>
												<?php endif?>
											<?php else:?>
												<?php $fila_ensayosWD->resultado_mensaje = formateo_valores($fila_ensayos2->resultado_mensaje, $frm_form_valo); ?>
												<td><?= $fila_ensayosWD->resultado_mensaje ?></td>
											<?php endif?>
											<?php
												
														$cumple = 'No aplica';
											?>
										<?php else: ?>
											<td>-</td>
										<?php endif ?>
									<?php endforeach ?>
								<?php endforeach ?>
							<?php else: ?>
							    <?php foreach($certificacion as $fila_analisis): ?>
    								<?php
    									$sql_ensayos2 = "
    										SELECT e.resultado_mensaje, m.id_tipo_analisis, e.id_ensayo_vs_muestra
    										FROM certificacion c, muestreo_detalle m, ensayo_vs_muestra e, ensayo p
    										WHERE 
    										c.id_muestreo_detalle=m.id_muestra_detalle
    										AND m.id_muestra_detalle=e.id_muestra
    										AND e.id_ensayo=p.id_ensayo
    										AND c.id_certificacion=$fila_analisis->id_certificacion 
    										AND e.id_ensayo=$fila_ensayos->id_ensayo ";//
    										$query_ensayos2 = $db->query($sql_ensayos2)->getResult();
    										$fila_ensayos2 = $query_ensayos2[0];
    								?>
    								<?php if (!isset($fila_ensayos2->resultado_mensaje) ):?>
    									<?php if($fila_ensayos2->resultado_mensaje == '0'):?>
    										<td>0</td>
    									<?php else:?>
    										<td>Pendientes</td>
    									<?php endif?>
    								<?php else:?>
    									<?php $fila_ensayosWD->resultado_mensaje = formateo_valores($fila_ensayos2->resultado_mensaje, $frm_form_valo); ?>
    									<td><?= $fila_ensayosWD->resultado_mensaje ?></td>
    								<?php endif?>
    								<?php
    									$evalua = evalua_alerta($fila_ensayos->med_valor_min,$fila_ensayos->med_valor_max, $fila_ensayosWD->resultado_mensaje, $fila_ensayos2->id_tipo_analisis, $fila_ensayos2->id_ensayo_vs_muestra, 2);
    									$cumple = preg_match("/-MAS-/", $evalua) ? "No cumple":"Cumple";
    									$cumple = preg_match("/-NOAPLICACUMPLE-/", $evalua) ? "No aplica": $cumple;
    									if($parametro[0]->id_calculo == 26)
    									    $cumple = 'No aplica';
    								?>
    							<!-- <td><?= $cumple ?></td> -->
    							<?php endforeach ?>
    							<td><?= $unidad ?></td>
    							<td><?= $incertidumbre ?></td>
						    <?php endif ?>
								
								<td>
									<?php if($fila_ensayos->med_valor_min <>'' && $fila_ensayos->med_valor_max <> ''): ?>
										<?= $fila_ensayos->med_valor_min.' - '.$fila_ensayos->med_valor_max ?>
										
									<?php elseif($fila_ensayos->med_valor_min <> ''): ?>
									    <?= 
									        $analisis[0]->id_muestra_tipo_analsis == 3 ||
									        $analisis[0]->id_muestra_tipo_analsis == 5 ||
									        $analisis[0]->id_muestra_tipo_analsis == 6 ? 'Min ' : '' ?>
										<?= $fila_ensayos->med_valor_min ?>
									<?php elseif($fila_ensayos->med_valor_max <> ''): ?>
									    <?= 
									        $analisis[0]->id_muestra_tipo_analsis == 3 ||
									        $analisis[0]->id_muestra_tipo_analsis == 5 ||
									        $analisis[0]->id_muestra_tipo_analsis == 6 ? 'Max ' : '' ?>
										<?= $fila_ensayos->med_valor_max ?>
										
									<?php else: ?>
										No aplica
									<?php endif ?>
								</td>
								<?php
									$tecnica = procesar_registro_fetch('tecnica', 'id_tecnica', $parametro[0]->id_tecnica);
								?>
								<td>
								    <!-- 26 si el parametro tiene IRCA Fecha: 21/09/2022  -->
								    <?php if($parametro[0]->id_calculo == 26): ?>
								        No aplica
								    <?php else: ?>
								        <?= $tecnica[0]->nor_nombre  ?><?= !empty($parametro[0]->par_metodo) ? " / {$parametro[0]->par_metodo}" : ""  ?>
								    <?php endif ?>
								</td>
								<td><?= $cumple ?></td>
						</tr>
	
				<?php endforeach ?>
	
	
				<?php $sql_norma_producto = 
					"SELECT * FROM ensayo e, producto p, norma n
							where e.id_producto=p.id_producto and p.id_norma=n.id_norma
							and e.id_ensayo=(SELECT MAX(id_ensayo) FROM ensayo_vs_muestra e where id_muestra=".$detalle[0]->id_muestra_detalle." )";
							$norma_producto = $db->query($sql_norma_producto)->getResult();
				?>
				</tbody>
			</table>
				<?php
					// firma de sistema
				$firma	 = procesar_registro_fetch('cms_firma', 'id_firma', $frm_mensaje_firma);
				$firma1 = procesar_registro_fetch('cms_users', 'id', $firma[0]->id_firma_1);
				$firma2 = procesar_registro_fetch('cms_users', 'id', $firma[0]->id_firma_2);
	
				$aux_nombre1    = $firma1[0]->nombre;
				$aux_cargo1     = $firma1[0]->cargo;
				$aux_firma1     = $firma1[0]->firma;
				$aux_nombre2     = $firma2[0]->nombre;
				$aux_cargo2      = $firma2[0]->cargo;
				$aux_firma2     = $firma2[0]->firma;
				?>
				<?php if($frm_plantilla == 1): ?>
    				<div class="texto-especificacion">
    					<p><b>Especificacion: </b><?= $norma_producto[0]->nor_nombre ?> - <?= $norma_producto[0]->pro_descripcion ? $norma_producto[0]->pro_descripcion : $norma_producto[0]->pro_nombre ?>
    					<?php if(!empty($fechasUtiles)): ?>
    						<?= !empty($complemento) ? "<br>$complemento":'' ?>
    					<?php endif ?>
    					<br>( * ) Ensayos acreditados: En Asbioquim SAS contamos con acreditación ONAC, vigente a la fecha con código de acreditación 19-LAB-002, bajo la norma NTC-ISO/IEC 17025:2017.
    					<br>( <sup>1</sup> ) La declaración de conformidad (Cumple/No cumple) del resultado obtenido frente a una especificación normativa, se determinó aplicando como regla de decisión, que el valor máximo de probabilidad de no cumplimiento será del 5% aplicando la fórmula del “Límite de tolerancia superior único” según la norma JCGM 106:2012.
    					<br>( <sup>2</sup> ) Análisis subcontratados
    					<br>( <sup>3</sup> ) Información suministrada por el cliente. Asbioquim SAS no se hace responsable por la información suministrada por el cliente.
    					<br>Los resultados son válidos únicamente para el ítem de ensayo analizado. Estos análisis no pueden ser reproducidos parcial o totalmente sin autorización del laboratorio Asbioquim SAS.
    					<br>Confirme la validez de este documento ingresando a <a href="https://asbioquim.com.co" target="_blank">asbioquim.com.co </a> y el código <?=  $type_informe == 1 ? $certificado->clave_documento_pre : $certificado->clave_documento_final?>
    				    
    					<?php if(!empty($modificacion)): ?>
    						<?= !empty($modificacion) ? "<br>Nota: $modificacion":'' ?>
    					<?php endif ?>
    					</p>
    				</div>
    				<table width="100%" class="firmas">
    				    <thead>
        					<tr>
        						<th>
        						    <?php if(!empty($aux_firma1)): ?>
        							    <img src="assets/img/firmas/<?= $aux_firma1 ?>" width="100">
        							<?php endif ?>
        						</th>
        						<th>
        						    <?php if(!empty($aux_firma2)): ?>
        							    <img src="assets/img/firmas/<?= $aux_firma2 ?>" width="100">
        							<?php endif ?>
        						</th>  
        					</tr>
    				    </thead>
    				    <tbody>
        					<tr>
        						<td class="firmas_2">
        							<br><strong><?= $aux_cargo1 ?></strong>
        						</td>
        						<td class="firmas_2">
        							<br><strong><?= $aux_cargo2 ?></strong>
        						</td>
        					</tr>
    				    </tbody>
    				</table>
    		
    				<div id="amc-header2" class="amc-centrado">                        
    					<strong> - FIN DE INFORME - </strong><br>
    				</div>
    			<?php endif ?>
		</div>
	</div>
</body>