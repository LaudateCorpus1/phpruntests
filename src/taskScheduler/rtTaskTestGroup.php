<?php
/**
 * rtTaskTestGroup
 *
 * @category   Testing
 * @package    RUNTESTS
 * @author     Zoe Slattery <zoe@php.net>
 * @author     Stefan Priebsch <spriebsch@php.net>
 * @author     Georg Gradwohl <g2@php.net>
 * @copyright  2009 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 *
 */
class rtTaskTestGroup extends rtTask implements rtTaskInterface
{
	protected $runConfiguration;
	protected $subDirectory;
	protected $redirectedTestCases = array();

	
	public function __construct($runConfiguration, $subDirectory)
	{
		$this->runConfiguration = $runConfiguration;
		$this->subDirectory = $subDirectory;
	}
	
	
	/**
	 * called by the child-process
	 * executes the the test-group
	 */
	public function run()
	{
		$testGroup = new rtPhpTestGroup($this->runConfiguration, $this->subDirectory);
		$testGroup->runGroup($this->runConfiguration);
        $this->result = $testGroup->getResults();
        $this->redirectedTestCases = $testGroup->getRedirectedTestCases();
		return true;
	}
	
	public function getRedirectedTestCases() {
		return $this->redirectedTestCases;
	}

}


?>