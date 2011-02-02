<?php
/**
 * Atomik Framework
 * Copyright (c) 2008-2009 Maxime Bouroumeau-Fuseau
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package Atomik
 * @subpackage Model
 * @author Maxime Bouroumeau-Fuseau
 * @copyright 2008-2009 (c) Maxime Bouroumeau-Fuseau
 * @license http://www.opensource.org/licenses/mit-license.php
 * @link http://www.atomikframework.com
 */

/** Atomik_Model_Field_Abstract */
require_once 'Atomik/Model/Field/Abstract.php';

/**
 * @package Atomik
 * @subpackage Model
 */
class Atomik_Model_Field_String extends Atomik_Model_Field_Abstract
{
	/**
	 * @return array
	 */
	public function getSqlType()
	{
		if (($length = $this->getOption('length', false)) === false || $length > 255) {
			return array('text', null);
		}
		return array('varchar', $length);
	}
	
	/**
	 * @return Atomik_Form_Field_Interface
	 */
	public function getDefaultFormField()
	{
		$length = $this->getOption('length', false);
		
		if ($length === false || $length > 255) {
			return Atomik_Form_Field_Factory::factory('Textarea', $this->name, $this->getOptions('form-'));
		}
		return Atomik_Form_Field_Factory::factory('Input', $this->name, $this->getOptions('form-'));
	}
}