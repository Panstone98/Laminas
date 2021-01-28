<?php

namespace LmcUserTest\Validator;

use LmcUser\Validator\RecordExists as Validator;
use PHPUnit\Framework\TestCase;

class RecordExistsTest extends TestCase
{
    protected $validator;

    protected $mapper;

    public function setUp():void
    {
        $options = array('key' => 'username');
        $validator = new Validator($options);
        $this->validator = $validator;

        $mapper = $this->createMock('LmcUser\Mapper\UserInterface');
        $this->mapper = $mapper;

        $validator->setMapper($mapper);
    }

    /**
     * @covers LmcUser\Validator\RecordExists::isValid
     */
    public function testIsValid()
    {
        $this->mapper->expects($this->once())
            ->method('findByUsername')
            ->with('lmcUser')
            ->will($this->returnValue('lmcUser'));

        $result = $this->validator->isValid('lmcUser');
        $this->assertTrue($result);
    }

    /**
     * @covers LmcUser\Validator\RecordExists::isValid
     */
    public function testIsInvalid()
    {
        $this->mapper->expects($this->once())
            ->method('findByUsername')
            ->with('lmcUser')
            ->will($this->returnValue(false));

        $result = $this->validator->isValid('lmcUser');
        $this->assertFalse($result);

        $options = $this->validator->getOptions();
        $this->assertArrayHasKey(\LmcUser\Validator\AbstractRecord::ERROR_NO_RECORD_FOUND, $options['messages']);
        $this->assertEquals($options['messageTemplates'][\LmcUser\Validator\AbstractRecord::ERROR_NO_RECORD_FOUND], $options['messages'][\LmcUser\Validator\AbstractRecord::ERROR_NO_RECORD_FOUND]);
    }
}
