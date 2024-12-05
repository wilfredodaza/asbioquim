<?php

namespace App\Controllers;
use App\Models\Cliente;
use App\Models\Muestreo;
use App\Models\Certificacion;
use App\Models\Emails;
use Config\Services;



class FuncionarioEmailController extends BaseController
{
  // ------------------------------------- Enviar emails

    public function emails(){
        $user = new Cliente();
        $clientes = $user
        ->select(['name', 'id'])
        ->where([
            'usertype' => 'Registered',
            'block' => 'Activo',
            'emails' => 'Permitido'
        ])->asObject()->get()->getResult();
        return view('funcionarios/emails', ['clientes' => $clientes]);
    }

    public function emails_certificado(){
        $data = new Muestreo();
        $id = $this->request->getPost('cliente');
        if(!empty($id)){
            $data->select([
                'certificacion.certificado_nro AS certificado_nro',
                'muestreo.mue_fecha_muestreo AS mue_fecha_muestreo',
                'muestreo.mue_subtitulo AS mue_subtitulo',
                'certificacion.cer_fecha_publicacion AS fecha_publicacion',
                'producto.pro_nombre as producto',
                'usuario.name as cliente',
                'usuario.id as id_cliente',
                'CONCAT (muestreo_detalle.ano_codigo_amc,"-",LPAD(muestreo_detalle.id_codigo_amc,5,"0")) as codigo',
                'certificacion.status_email as status'
            ])
            ->join('usuario', 'muestreo.id_cliente = usuario.id', 'left')
            ->join('certificacion', 'muestreo.id_muestreo = certificacion.id_muestreo', 'left')
            ->join('muestreo_detalle', 'certificacion.id_muestreo_detalle = muestreo_detalle.id_muestra_detalle', 'left')
            ->join('producto', 'producto.id_producto = muestreo_detalle.id_producto', 'left')
            ->orderBy('certificacion.certificado_nro', 'desc')
            ->whereIn('id_cliente', $id)
            ->where([
                'muestreo.mue_estado !=' => 0,
                // 'certificacion.cer_fecha_informe !=' => '0000-00-00 00:00:00',
                'certificacion.cer_fecha_publicacion !=' => NULL
            ]);
            $data = $data->asObject()->get()->getResult();
            foreach ($data as $key => $value) {
                $value->fecha_publicacion = '
                <label>
                    <input type="checkbox" name="certificados[]" value="'.$value->certificado_nro.'" />
                    <span></span>
                </label>';
                if($value->status == 'Sin enviar')
                    $value->status = '<span class="new badge orange lighten-5 orange-text  gradient-shadow" data-badge-caption="'.$value->status.'"></span>';
                else
                    $value->status = '<span class="new badge green lighten-5 green-text  gradient-shadow" data-badge-caption="'.$value->status.'"></span>';
            }
        }else{
            $data = [];
        }
        return json_encode($data);
    }
    
    public function get_emails(){
        $emailsModel = new Emails();
        $emails = $emailsModel->orderBy('id', 'DESC')->asObject()->get()->getResult();
        return json_encode([
            'data' => $emails
        ]);
    }

    public function create_email(){
        $data = $this->request->getPost('email');
        $emailsModel = new Emails();
        $email = $emailsModel->where(['email' => $data])->asObject()->get()->getResult();
        if(!empty($email[0])){
            return json_encode([
                'validado' => false
            ]);
        }else{
            $emailsModel = new Emails();
            $data = $emailsModel->insert(['email' => $data]);
            return json_encode([
                'validado' => true,
                'data' => $data
            ]);
        }
    }

    public function emails_certificado_send(){
        $db = \Config\Database::connect();
        $data = (object)$this->request->getPost();
        $emailsModel = new Emails();
        $emails = $emailsModel->select('email')->whereIn('id', $data->emails)->get()->getResult();
        $email_to = [];
        foreach ($emails as $key => $email) {
            array_push($email_to, $email->email);
        }
        $sendCliente = implode(',', $email_to);
        $certificados = $this->request->getPost('certificados');
        $id_cliente = $this->request->getPost('id_cliente');
        $emails = $this->request->getPost('addEmails');
        $id_mensaje_tipo = 2;
        mkdir(WRITEPATH."uploads/Informes", 0777);
        chmod(WRITEPATH."uploads/Informes", 0777);
        // return json_encode($data);
        $archivo = WRITEPATH."uploads/Informes-".date('y_m_d_h_i_s').".zip";
        foreach ($certificados as $key => $certificado_nro) {
            $c_v_m = procesar_registro_fetch('certificacion_vs_mensaje', 'id_certificacion', $certificado_nro, 'id_mensaje_tipo', $id_mensaje_tipo);
            $certificado = procesar_registro_fetch('certificacion', 'certificado_nro', $certificado_nro);
            $certificado = $certificado[0];
            //formateo de muestreo
            $sql = "select * from muestreo where id_muestreo=$certificado->id_muestreo  group by id_muestreo";
            $query = $db->query($sql)->getResult();
            $muestreo = $query[0];
            
            $clienteM = new Cliente();  
            $cliente = $clienteM->where(['id' => $muestreo->id_cliente])->asObject()->first();
            
            $fecha_analisis = recortar_fecha($muestreo->mue_fecha_muestreo,1);
            $frm_form_valo = $c_v_m[0]->form_valo; //tipo de formateo de la plantilla
            $frm_plantilla = $c_v_m[0]->id_plantilla;
            $frm_mensaje_resultado = $c_v_m[0]->id_mensaje_resultado; // cero para cuando venga de creacion de construccion de documento
            $frm_mensaje_observacion = $c_v_m[0]->id_mensaje_comentario;
            $frm_mensaje_firma = $c_v_m[0]->id_firma;
            $frm_complemento = $c_v_m[0]->complemento;
            if($certificado->cer_fecha_informe == '0000-00-00 00:00:00'){
                $aux_fecha_informe = date("Y-m-d H:i:s");
            }else{
                $aux_fecha_informe = $certificado->cer_fecha_informe;
            }
            $campo_primer_informe = $id_mensaje_tipo == 2 ? 0:1;
                $sql_ensayos = "SELECT 
                        DISTINCT p.id_parametro
                        ,p.fecha_aplica_referencia
                        ,p.id_ensayo
                        ,p.refe_bibl
                        ,p.med_valor_min
                        ,p.med_valor_max								
                        FROM certificacion c, muestreo_detalle m, ensayo_vs_muestra e, ensayo p
                    where c.id_muestreo_detalle=m.id_muestra_detalle
                    and m.id_muestra_detalle=e.id_muestra
                    and e.id_ensayo=p.id_ensayo
                    and m.id_producto = p.id_producto
                    and e.campo_primer_informe=$campo_primer_informe
                    and c.certificado_nro=$certificado->certificado_nro "; // group by e.id_ensayo
                $query_ensayos = $db->query($sql_ensayos)->getResult();
                $onac = '';
                foreach($query_ensayos as $fila_ensayos){
                    $parametro = procesar_registro_fetch('parametro', 'id_parametro', $fila_ensayos->id_parametro);
                    if( preg_match('/[*]/', $parametro[0]->par_descripcion) ){
                        $onac = '<img src="assets/img/onac_2.png" height="105">';
                        break;
                    }

                }
                $mpdf = new \Mpdf\Mpdf([
                    'mode' => 'utf-8',
                    'format' => 'Letter',
                    "margin_left" => 5,
                    "margin_right" => 5,
                    "margin_top" => 35,
                    "margin_bottom" => 14,
                    "margin_header" => 5.5
                ]);
                $parametros_view = [
                    'type_informe'                  => $tipo_mensajes,
                    'certificado'                   => $certificado,
                    'cliente'                       => $cliente,
                    'muestreo'                      => $muestreo,
                    'aux_fecha_informe'             => $aux_fecha_informe,
                    'fecha_analisis'                => $fecha_analisis,
                    'detalle_para_tipo_muestreo'    => $detalle_para_tipo_muestreo,
                    'frm_plantilla'                 => $frm_plantilla,
                    'frm_form_valo'                 => $frm_form_valo,
                    'frm_mensaje_resultado'         => $frm_mensaje_resultado,
                    'tipo_mensajes'                 => $id_mensaje_tipo, 
                    'frm_mensaje_firma'             => $frm_mensaje_firma,
                    'complemento'                   => $frm_complemento,
                    'modificacion'                  => $frm_modificacion,
                    'query_ensayos'                  => $query_ensayos
                ];
                
                $css  = file_get_contents('assets/css/styles.css');
                $html = view('views_mpdf/cliente/plantilla',$parametros_view);
                
                $mpdf->SetDefaultBodyCSS('background-image', "assets/img/image001.jpg");
                $mpdf->SetDefaultBodyCSS('background-image-resize', 6);
                $mpdf->SetDefaultBodyCSS('background-image-resolution', '300dpi');
                $mpdf->SetDefaultBodyCSS('background-image-opacity', 0.6);
                $mpdf->SetHTMLFooter('
                    <table width="100%">
                        <tr>
                            <td width="100%" align="right">Pagina {PAGENO}/{nbpg}</td>
                        </tr>
                    </table>');
                    
                $mpdf->SetHTMLHeader('
                    <table style="width: 100%;">
                        <thead>
                            <tr class="amc-centrado">
                                <th>
                                    &nbsp;
                                    &nbsp;
                                </th>
                                <th>
                                    '.$onac.'
                                </th>
                                <th class="right data_aux">
                                        CÓDIGO: PRO-F-008
                                        <br>
                                        VERSIÓN: 07
                                        <br>
                                        FECHA DE VIGENCIA: 2022-09-02
                                </th>
                            </tr>
                        </thead>	
                    </table>
                ');
            
            $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
            $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
            $name = 'Informe-'.$certificado_nro.'.pdf';
            $name = str_replace(' ', '_', $name);
            $zip = new \ZipArchive();
            $cliente->name = str_replace(' ', '_', $cliente->name);
            $zip->open($archivo, \ZipArchive::CREATE);
            
            // chmod($archivo, 0777);
            $name = strtolower($name);
            $mpdf->Output(WRITEPATH."uploads/Informes/$name",'F');
            if(!empty($certificado->doc_informe_final)){
                if (file_exists("assets/img/docs_informes/$certificado->doc_informe_final")){
                    $zip->addFile("assets/img/docs_informes/$certificado->doc_informe_final", "Informe-$certificado_nro/$certificado->doc_informe_final");
                    $zip->addFile(WRITEPATH."uploads/Informes/$name", "Informe-$certificado_nro/$name");
                }else $zip->addFile(WRITEPATH."uploads/Informes/$name", $name);
            }else $zip->addFile(WRITEPATH."uploads/Informes/$name", $name);
            $zip->close();
            unlink(WRITEPATH."uploads/Informes/$name");
        }
        rmdir(WRITEPATH."uploads/Informes");

        $asunto = $this->request->getPost('asunto');
        $mensaje = $this->request->getPost('texto');
        
        $clienteM = new Cliente();  
        $clientes = $clienteM->whereIn('id', $id_cliente)->asObject()->get()->getResult();
        
        // return json_encode($clientes);
        $fileSize = formatBytes(filesize($archivo));
        
        if(!($fileSize[0] > 10 && ($fileSize[1] == 'MB' || $fileSize[1] == 'GB' || $fileSize[1] == 'TB' ))){
            $email = \Config\Services::email();
            $email->setFrom('resultados@asbioquim.com.co', !empty(configInfo()['name_app']) ? configInfo()['name_app'] : 'IPlanet Colombia S.A.S');
            // $email->setFrom('wsbonilladiaz@gmail.com', !empty(configInfo()['name_app']) ? configInfo()['name_app'] : 'IPlanet Colombia S.A.S');
            // $email->setFrom('resultados_2@asbioquim.com.co', !empty(configInfo()['name_app']) ? configInfo()['name_app'] : 'IPlanet Colombia S.A.S');
            $email->setTo($email_to);
            $email->setSubject($asunto);
            $email->setMessage($mensaje);
            $email->attach($archivo, 'attachment');
            if($email->send()){
                $certificacionM = new Certificacion();
                $certificacionM->set(['status_email' => 'Enviado'])->whereIn('certificado_nro', $certificados)->update();
                $respuesta = [
                    'status' => true,
                    'mensaje' => "Los informes se han enviado correctamente a $sendCliente ",
                ];
            }else{
                $respuesta = [
                    'status' => false,
                    'mensaje' => json_encode($email->printDebugger(['headers']))
                ];
            }
        }else{
            $respuesta = [
                'status' => false,
                'mensaje' => "Supero el limite de 10 MB. Por favor seleccione menos informes. ($fileSize[0] $fileSize[1])",
            ];
        }
        
        unlink($archivo);
        return json_encode($respuesta);
    }
}

function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= pow(1024, $pow);

    return [round($bytes, $precision), $units[$pow]];
}






