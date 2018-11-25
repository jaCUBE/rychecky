<?php


use PHPUnit\Framework\TestCase;

class ListTest extends TestCase
{


    public function testCertificateList()
    {
        $list = CertificateList::all();
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Certificate', $list[0]);
    }


    public function testExperienceList()
    {
        $list = ExperienceList::all();
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Experience', $list[0]);
    }


    public function testHobbyList()
    {
        $list = HobbyList::all();
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Hobby', $list[0]);
    }


    public function testPortfolioList()
    {
        $list = PortfolioList::all();
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Portfolio', $list[0]);
    }


    public function testSkillList()
    {
        $list = SkillList::findByType('webdev');
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Skill', $list[0]);
    }


    public function testSocialList()
    {
        $list = SocialList::all();
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Social', $list[0]);
    }

}