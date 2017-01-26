<?php

namespace App\Services;

use Form;
use Collective\Html\FormBuilder;

/**
* Macros de formulario
*/
class Macros extends FormBuilder
{

	function __construct()
	{
		# code...
	}
	/**
	 * Boton para regresar al formulario anterior
	 * @param string $value [description]
	 */
	public function Back()
	{
		Form::macro('back', function ($url) {
            return '
            	<a href="'.$url.'" class="btn default">
	                <i class="fa fa-mail-reply"></i>
	                REGRESAR
                </a>

            ';
        });
	}
	/**
	 * Boton para hacer Submit
	 * @param string $value [description]
	 */
	public function Enviar()
	{
		Form::macro('enviar', function ($name,$color = 'green') {

            return '
            	<button type="submit" class="btn '.$color.' uppercase">
            	<i class="fa fa-save"></i>
            	'.$name.'
            	</button>
            ';
        });
	}
	/**
	 * Boton link
	 */
	public function Boton()
	{
		Form::macro('boton',function($name,$url,$color = '',$icon = null){
			$iconclass = (isset($icon)) ? '<i class="'.$icon.'"></i>' : '' ;
			return '
				<a href="'.$url.'" class="btn '.$color.'">
	                '.$iconclass.'
	                '.$name.'
	            </a>
			';
		});

	}
	/**
	 * Menu
	 */
	public function Menu()
	{
		Form::macro('menu',function($name,$url,$icon = null,$start=null){
			$iconclass = (isset($icon)) ? '<i class="'.$icon.'"></i>' : '' ;

			return '
				<li class="nav-item '.$start.' ">
		            <a href="'.$url.'" class="nav-link nav-toggle">
		               '.$iconclass.'
		                <span class="title">'.$name.'</span>
		                <span class="arrow"></span>
		            </a>
		        </li>
			';
		});

	}
	/**
	 * Menu LINK
	 */
	public function MenuLink()
	{
		Form::macro('menulink',function($name,$url,$icon = null){
			$iconclass = (isset($icon)) ? '<i class="'.$icon.'"></i>' : '' ;

			return '
		            <a href="'.$url.'" class="nav-link nav-toggle">
		               '.$iconclass.'
		                <span class="title">'.$name.'</span>
		                <span class="arrow"></span>
		            </a>
			';
		});

	}

}

