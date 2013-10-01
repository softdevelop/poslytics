<?php
/**
 * This xls helper is based on the one at
 * http://ykyuen.wordpress.com/2009/10/04/cakephp-export-data-to-a-xls-file/
 * actually creates an xml which is openable in Microsoft Excel.
 * Extended by Nik Chankov 
 * Originally written by Yuen Ying Kit @ ykyuen.wordpress.com
 *
 */
class XlsHelper extends AppHelper {
    /**
     * set the header of the http response.
     *
     * @param unknown_type $filename
     */
    function setHeader($filename) {
        header("Pragma: public");
        header("Expires: 0");
        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
        header("Content-Type: application/force-download");
        header("Content-Type: application/download");;
        header("Content-Disposition: inline; filename=\"".$filename.".xls\"");
    }

    /**
     * Return the workbook
     * @param string $content content of the wrkbook
     * @return string
     */
    function workbook($content) {

        return $content;
    }

    /**
     * Add worksheet
     * @param string $name name of the Worksheet
     * @param string $content content of the worlsheet
     * @return string
     */
    function worksheet($name, $content) {
        $ret = "\t".'<Worksheet ss:Name="'.$name.'">'."\n";
        $ret .= "\t\t".'<Table>'."\n";
        $ret .= $content;
        $ret .= "\t\t".'</Table>'."\n";
        $ret .= "\t".'</Worksheet>'."\n";
        return $ret;
    }

    /**
     * Create a row
     * @param string $content content of the worlsheet
     * @return string
     */
    function row($content) {
        $ret = "\t\t\t".'<Row>'."\n";
        $ret .= $content;
        $ret .= "\t\t\t".'</Row>'."\n";
        return $ret;
    }

    /**
     * Create a cell
     * @param mixed $value value of the cell
     * @param string $type type of the cell. For now it can be either String or Number
     * @return string
     */
    function cell($value, $type = 'String') {
        if (is_null($value)) {
            $ret = "\t\t\t\t".'<Cell><Data ss:Type="String"> </Data></Cell>'."\n";
        } else {
            $ret = "\t\t\t\t".'<Cell><Data ss:Type="'.$type.'">'.$value.'</Data></Cell>'."\n";
        }
        return $ret;
    }
    
    /**
     * Create header cell with bold text
     * The function is the same as this->cell, but bolded
     * @param mixed $value value of the cell
     * @param string $type type of the cell. For now it can be either String or Number
     * @return string
     */
    function hcell($value, $type = 'String') {
        if (is_null($value)) {
            $ret = "\t\t\t\t".'<Cell ss:StyleID="s23"><Data ss:Type="String"> </Data></Cell>'."\n";
        } else {
            $ret = "\t\t\t\t".'<Cell ss:StyleID="s23"><Data ss:Type="'.$type.'">'.$value.'</Data></Cell>'."\n";
        }
        return $ret;
    }
}
?>