<?php
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase{

    protected $user;

    protected function setUp(): void{
        $this->user = new App\Models\User;
    }
    
    public function testUserFirstName(){
        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
    } 

    public function testGetLastName(){
        $this->user->setLastName('Mod');

        $this->assertEquals($this->user->getLastName(), 'Mod');
    } 

    public function testGetFullName(){
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Mod');

        $this->assertEquals($this->user->getFullName(), 'Billy Mod');
    }

    public function testFirstNameAndLastNameAreTrimmed(){
        $this->user->setFirstName('  Billy   ');
        $this->user->setLastName(' Mod   ');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
        $this->assertEquals($this->user->getLastName(), 'Mod');
    }

    public function testEmailVariablesContainCorrectValues(){
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Mod');
        $this->user->setEmail('billy@gmail.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], $this->user->getFullName());
        $this->assertEquals($emailVariables['email'], $this->user->getEmail());
    }
}

?>