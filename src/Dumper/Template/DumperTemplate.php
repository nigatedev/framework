<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Dumper\Template;

/**
* DumperTemplate class
*
* @author Abass Ben Cheik <abass@todaysdev.com>
*/
class DumperTemplate
{



  /**
  * @params $pre can be any type of data
  *
  * @return data {$pre} surround by <pre> and </pre> HTML tag
  */
    public function pre($data)
    {
    
        return $this->getDataType($data);
    }

    public function getDataType($data)
    {
        $dataType = gettype($data);
        switch ($dataType) {
            case 'string':
                return $this->dataTypeIs(["Type" => "String", "Value" => $data]);
            break;
            case 'double':
                return $this->dataTypeIs(["Type" => "Float", "Value" => $data]);
            break;
            case 'integer':
                return $this->dataTypeIs(["Type" => "Integer", "Value" => $data]);
            break;
            case 'array':
                return $this->dataTypeIs(["Type" => "Array", "Value" => $data]);
            break;
            case 'object':
                return $this->dataTypeIs(["Type" => "Object", "Value" => $data::class."()"]);
            break;
            case 'boolean':
                if (!$data) {
                    $checkBool = "False";
                } else {
                    $checkBool = "True";
                }
                return $this->dataTypeIs(["Type" => "Bool", "Value" => $checkBool]);
            break;
            case 'NULL':
                return $this->dataTypeIs(["Type" => "NULL", []]);
            break;

            default:
                return "This type of data is not implemented yet try default (var_dump())";
            break;
        }
    }

    public function dataTypeIs($array = [])
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $key => $arrayTypeValue) {
                    echo "
         <i style='padding:0;background:#161a1a;'>
        <span style='color:#fff;'>
          <span style='color:#10ae00;'>
           [$key]
          </span>
           <span style='color:#960495'>=></span> Value => $arrayTypeValue
         </span> <br />
          </i>
         ";
                }
            } else {
                echo "
         <i style='padding:0;background:#161a1a;'>
        <span style='color:#fff;'>
          <span style='color:#10ae00;'>
            $key
          </span>
           <span style='color:#960495'>=></span> $value
         </span> <br />
          </i>
         ";
            }
        }
    }
}
