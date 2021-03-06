<?php
/**
 * Created by PhpStorm.
 * User: nguyen-dat
 * Date: 19/11/2017
 * Time: 09:12
 */
namespace App\BaseWidget;

use \App\BaseWidget\Validator;
use Illuminate\Support\Facades\View;

class Form
{
    /**
     * @param array $paramAttributes
     * @param $name
     * @return string|void
     */
    public static function button($name, $paramAttributes = array())
    {
        if (!Validator::isNullOrEmpty($name)) {
            return;
        }

        ob_start();
        echo '<button '. self::getAttributes($paramAttributes).' >'.$name.'</button>';

        return ob_get_clean();
    }

    /**
     * @param array $paramAttributes
     * @param $name
     * @return string|void
     */
    public static function link($name, $paramAttributes = array())
    {
        if (!Validator::isNullOrEmpty($name)) {
            return;
        }

        ob_start();
        echo '<a '. self::getAttributes($paramAttributes).' >'.$name.'</a>';

        return ob_get_clean();
    }

    /**
     * @param array $paramAttributes
     * @return string
     */
    public static function input($paramAttributes=array())
    {
        ob_start();
        echo '<input '. self::getAttributes($paramAttributes).' />';

        if (isset($paramAttributes['type']) == 'file' && isset($paramAttributes['help-block'])) {
            echo '<p class="help-block">'.$paramAttributes['help-block'].'</p>';
        }

        return ob_get_clean();
    }

    /**
     * @param array $paramAttributes
     * @return string
     */
    public static function date($paramAttributes=array())
    {
        ob_start();
        echo '<div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input '. self::getAttributes($paramAttributes).' id="datepicker">
            </div>';

        return ob_get_clean();
    }

    /**
     * @param array $paramAttributes
     * @return string
     */
    public static function radio($name, $paramAttributes=array())
    {
        ob_start();

        echo '<label><input type="radio" '.self::getAttributes($paramAttributes).' class="minimal"> '.$name.'</label>';

        return ob_get_clean();
    }

    /**
     * @param $name
     * @param array $paramAttributes
     * @return string
     */
    public static function checkbox($name, $paramAttributes=array())
    {
        ob_start();

        echo '<label><input type="checkbox" '.self::getAttributes($paramAttributes).' class="minimal"> '.$name.'</label>';

        return ob_get_clean();
    }

    /**
     * @param array $paramAttributes
     * @param $name
     * @return string|void
     */
    public static function label($name, $paramAttributes = array())
    {
        if (!Validator::isNullOrEmpty($name)) {
            return;
        }

        ob_start();
        echo '<label '. self::getAttributes($paramAttributes) . '>'.$name.'</label>';

        return ob_get_clean();
    }

    /**
     * @param array $paramAttributes
     * @param array $paramOptions
     * @return string
     */
    public static function select($paramAttributes= array(), $paramOptions = array())
    {
        ob_start();
        echo '<select '. self::getAttributes($paramAttributes).'>
                    '.self::getOptions($paramOptions).'
              </select>';

        return ob_get_clean();
    }

    public static function table($title, $titleHeaders, $datas)
    {
        return view('adminlte::layouts.partials.table', array('title' => $title,'titleHeaders'=> $titleHeaders, 'datas' => $datas));
    }

    /**
     * @param array $paramAttributes
     * @return string
     */
    public static function getAttributes($paramAttributes = array())
    {
        $attributes = "";
        if (is_array($paramAttributes) && count($paramAttributes) > 0) {
            foreach ($paramAttributes as $key => $param) {
                $attributes .= $key .'= "'.$param.'"';
            }
        }

        return $attributes;
    }

    /**
     * @param array $paramOptions
     * @return string
     */
    public static function getOptions($paramOptions = array())
    {
        if (count($paramOptions)) {
            $options = "";
            foreach ($paramOptions as $option => $attribute) {
                if (is_array($attribute)) {
                    foreach ($attribute as $key => $val)
                    {
                        $options .= '<option '.$key.' = "'.$val.'" >'.$option.'</option>';
                    }
                } else {
                    $options .= '<option>'.$attribute.'</option>';
                }

            }
        }

        return $options;
    }


}