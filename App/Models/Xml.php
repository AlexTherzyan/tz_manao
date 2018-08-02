<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 02.08.2018
 * Time: 10:09
 */

namespace App\Models;
use SimpleXMLElement;



class Xml
{

    static $success = '';

    /*
    *  Создаем и записываем пользователя в xml файл
    */
    public static function createXML($arr = [])
    {

        //function defination to convert array to xml
        function array_to_xml($array, &$xml_user_info) {
            foreach($array as $key => $value) {
                if(is_array($value)) {
                    if(!is_numeric($key)){
                        $subnode = $xml_user_info->addChild("$key");
                        array_to_xml($value, $subnode);
                    }else{
                        $subnode = $xml_user_info->addChild("item$key");
                        array_to_xml($value, $subnode);
                    }
                }else {
                    $xml_user_info->addChild("$key",htmlspecialchars("$value"));
                }
            }
        }

        //creating object of SimpleXMLElement
        $xml_user_info = new SimpleXMLElement("<?xml version=\"1.0\"?><user_info></user_info>");

        //function call to convert array to xml
        array_to_xml($arr,$xml_user_info);

        //saving generated xml file
        $xml_file = $xml_user_info->asXML('users.xml');

        //success and error message based on xml creation
        if($xml_file){
            Xml::$success = 'XML файл успешно создан.';

        }else{
            Xml::$success =  'ошибка при создании XML файла.';
        }



    }






}