<?php
/**
 * Created by PhpStorm.
 * User: jbelinchonm
 * Date: 26/11/15
 * Time: 20:23
 */

namespace Vallas\ModelBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;
use Nelmio\Alice\Fixtures;

class VallasFixturesLoader extends AbstractLoader
{

    private static $categoria_options = array('A' => 'A', 'AA' => 'AA', 'AAA' => 'AAA');
    private static $nivel_socioeconomico_options = array('A/B'=>'A/B', 'C+'=>'C+', 'C'=>'C', 'D+'=>'D+', 'D'=>'D', 'E'=>'E');
    private static $estatus_iluminacion_options = array('SI', 'NO');
    private static $trafico_vehicular_options = array('ALTO', 'MEDIO', 'MODERADO');
    private static $trafico_transeuntes_options = array('ALTO', 'MEDIO', 'MODERADO');
    private static $visibilidad_options = array('TOTAL', 'PARCIAL', 'NULA');

	/**
	 * {@inheritDoc}
	 */
	public function getFixtures()
	{
		return  [
				__DIR__.'/users.yml',

		];
	}

	public function medioEstatusIluminacion()
	{
        return self::$estatus_iluminacion_options[array_rand(self::$estatus_iluminacion_options)];
	}

	public function medioVisibilidad()
	{
        return self::$visibilidad_options[array_rand(self::$visibilidad_options)];
	}

    public function medioTraficoVehicular()
    {
        return self::$trafico_vehicular_options[array_rand(self::$trafico_vehicular_options)];
    }

    public function medioTraficoTranseuntes()
    {
        return self::$trafico_transeuntes_options[array_rand(self::$trafico_transeuntes_options)];
    }

    public function medioNivelSocioeconomico()
    {
        return self::$nivel_socioeconomico_options[array_rand(self::$nivel_socioeconomico_options)];
    }

    public function medioCategoria()
    {
        return self::$categoria_options[array_rand(self::$categoria_options)];
    }
}