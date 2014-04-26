<?php

require_once (__DIR__ . '/Compiler.php');
require_once (__DIR__ . '/libs/scssphp/scss.inc.php');

class SCSSCompiler extends Compiler {

    /**
     * @var scssc
     */
    private $scssphp;

    /**
     * Constructor
     * @return scssc
     */
    public function __construct() {     
        $this->scssphp = new scssc();
    }

    /**
     * Parse a scssc file to CSS
     * @param string path to file
     * @return string CSS
     */
    public function toCss($file) {
        $this->scssphp->setImportPaths(dirname($file));
        return ($css = @ file_get_contents($file)) !== false ? $this->scssphp->compile($css) : '';
    }

}