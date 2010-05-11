<?php
require_once 'PHPUnit/Framework.php';

require_once dirname(__FILE__).'/../../exceptions/RecordNotFoundException.class.php';

/**
 * Test class for RecordNotFoundException.
 * Generated by PHPUnit on 2010-05-02 at 11:27:14.
 */
class RecordNotFoundExceptionTest extends PHPUnit_Framework_TestCase {
    /**
     * @var RecordNotFoundException
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
		// WARNING! Do not change the line number below - the test below will fail
        $this->object = new RecordNotFoundException( 'user' );
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
    }

	public function test_lineno() {
		$this->assertEquals($this->object->getCode(), 0);
		$this->assertEquals($this->object->getFile(), __FILE__);
		$this->assertEquals($this->object->getLine(), 22);
		// $this->assertEquals($this->object->getMessage(), 'Invalid Field');
		$this->assertEquals($this->object->getPrevious(), '');
		// $this->assertEquals($this->object->getTrace(), '');
//		$this->assertEquals($this->object->getTraceAsString(), '0 C:\xampp\php\PEAR\PHPUnit\Framework\TestCase.php(715): RecordNotFoundExceptionTest->setUp()
//#1 C:\xampp\php\PEAR\PHPUnit\Framework\TestResult.php(686): PHPUnit_Framework_TestCase->runBare()
//#2 C:\xampp\php\PEAR\PHPUnit\Framework\TestCase.php(667): PHPUnit_Framework_TestResult->run(Object(RecordNotFoundExceptionTest))
//#3 C:\xampp\php\PEAR\PHPUnit\Framework\TestSuite.php(753): PHPUnit_Framework_TestCase->run(Object(PHPUnit_Framework_TestResult))
//#4 C:\xampp\php\PEAR\PHPUnit\Framework\TestSuite.php(729): PHPUnit_Framework_TestSuite->runTest(Object(RecordNotFoundExceptionTest), Object(PHPUnit_Framework_TestResult))
//#5 C:\xampp\php\PEAR\PHPUnit\Framework\TestSuite.php(688): PHPUnit_Framework_TestSuite->run(Object(PHPUnit_Framework_TestResult), false, Array, Array, false)
//#6 C:\xampp\php\PEAR\PHPUnit\TextUI\TestRunner.php(349): PHPUnit_Framework_TestSuite->run(Object(PHPUnit_Framework_TestResult), false, Array, Array, false)
//#7 C:\xampp\php\PEAR\PHPUnit\TextUI\Command.php(213): PHPUnit_TextUI_TestRunner->doRun(Object(NetBeansSuite), Array)
//#8 C:\xampp\php\PEAR\PHPUnit\TextUI\Command.php(146): PHPUnit_TextUI_Command->run(Array, true)
//#9 C:\xampp\php\phpunit(54): PHPUnit_TextUI_Command::main()
//#10 {main}');
	}

    public function test__toString() {
        $this->assertEquals($this->object->__toString(), "user [RECORD_NOT_FOUND]");
    }

    public function test__setField() {
        $this->assertEquals($this->object->getField(), 'undefined');
        $this->object->setField('randomFieldName');
        $this->assertEquals($this->object->getField(), 'randomFieldName');

        $this->object->setField(null);
		$this->assertNull($this->object->getField());

        $this->object->setField(-1234567.52435);
		$this->assertEquals($this->object->getField(), -1234567.52435);
	}

    public function test__setValue() {
        $this->assertEquals($this->object->getValue(), 'undefined');
        $this->object->setValue('randomFieldValue');
        $this->assertEquals($this->object->getValue(), 'randomFieldValue');

		$this->object->setValue(null);
		$this->assertNull($this->object->getValue());

        $this->object->setValue(-1234567.52435);
		$this->assertEquals($this->object->getValue(), -1234567.52435);
	}
}
?>