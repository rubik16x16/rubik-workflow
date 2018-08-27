<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

      
        $herramientas_principales = $this->load('herramientas')->herramientas;
dd($herramientas_principales);
       $listaherramientasprincipales = array();
       foreach ($herramientas_principales as  $cadaherramienta){
                 $listaherramientasprincipales[] = $cadaherramienta;
       }
       
       $herramientas_secundarias = $this->load('herramientas')->herramientas;
       $listaherramientassecundarias = array();
       foreach ($herramientas_secundarias as  $cadaherramienta){
                 $listaherramientassecundarias[] = $cadaherramienta;
       }

       $herramientas_mano = $this->load('herramientasmano')->herramientasmano;
       $listaherramientasmano = array();
       foreach ($herramientas_mano as  $cadaherramienta){
                 $listaherramientasmano[] = $cadaherramienta;
       }

       $vehiculo_requisitos = $this->load('vehiculorequisitos')->vehiculorequisitos;
       $listarequisitos = array();
       foreach ($vehiculo_requisitos as  $cadarequisito){
                 $listarequisitos[] = $cadarequisito;
       }

if ($request->is('api/project/soloprincipales/*')) {
      
      $proyecto = [
          'herramientas_principales ' => $listaherramientasprincipales
      ]; 

      }
else
if ($request->is('api/project/solosecundarias/*')) {
      
      $proyecto = [
          'herramientas_backup ' => $listaherramientassecundarias      
      ]; 

      }
else 
if ($request->is('api/project/solodemano/*')) {
      
      $proyecto = [
          'herramientas_mano' => $listaherramientasmano
      ]; 

      }
else 
 {
        $proyecto = [
         'project' => [
        
        'id' => $this->id,
        'cliente' => $this->nrocta_cliente,
        'locacion' => $this->idlocacion,
        'n_pozo' => $this->idpozo,
        'servicio' => $this->idservicio,
        'operacion' => $this->idoperacion,
        'listprecios' => $this->idlistaprecios,
        'programa_cliente' => $this->programa_cliente,
        'cia_pu_wo_ct_drilling' => $this->id_cia_pu_wo_ct_drilling,
        'solicito' => $this->solicito,
        'preparo' => $this->idpreparo,
        'siam_casing' => $this->id_siam_casing,
        'libraje' => $this->id_libraje,
        'drift' => $this->drift,
        'diam_cano_ct' => $this->diam_cano_ct,
        'tipo_fluido' => $this->tipo_fluido,
        'o_t_f' => $this->o_t_f,
        'cia_trepano' => $this->cia_trepano,
        'desc_oper' => $this->desc_oper,
        'diseno' => $this->diseno,
        'aprobadopor' => $this->aprobadopor,
        'fecha' => $this->previstopara,
        'fechaymedio' => $this->fechaymedio
    ],
    'herramientas_principales ' => $listaherramientasprincipales,
    'herramientas_backup ' => $listaherramientassecundarias,
    'herramientas_mano' => $listaherramientasmano,
    'vehiculo' => $listarequisitos
     ];
       
}
        return $proyecto;

         
       }
    }


