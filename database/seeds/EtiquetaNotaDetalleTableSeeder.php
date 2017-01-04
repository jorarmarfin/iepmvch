<?php

use Illuminate\Database\Seeder;
use App\Models\EtiquetaNotaDetalle;
use App\Models\EtiquetaNota;
use App\Models\Catalogo;
class EtiquetaNotaDetalleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$label = EtiquetaNota::all();
    	$label = $label->each(function($item,$key){
    		$limite = explode(';',$item->rango);
    		for ($i=$limite[0]; $i <= $limite[1]; $i++) {
        		EtiquetaNotaDetalle::create(['idetiquetanota' => $item->id,'nota' => $i,'literal' => $item->nombre]);
    		}
    	});
    }
}
