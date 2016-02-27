<?php
/**
 * Hidden Comment Plugin: allows hidden comments in the wiki source
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Esther Brunner <wikidesign@gmail.com>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');
 
/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_comment extends DokuWiki_Syntax_Plugin {
 
    function getType(){ return 'substition'; }
    function getSort(){ return 321; }
    
    function connectTo($mode) {
        $this->Lexer->addSpecialPattern("^/\*.*?\*|\s+/\*.*?\*/", $mode, 'plugin_comment');
    }
    
    function handle($match, $state, $pos, Doku_Handler $handler){ return ''; }            
    function render($mode, Doku_Renderer $renderer, $data) { return true; }
}
// vim:ts=4:sw=4:et:enc=utf-8:
