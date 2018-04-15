<?php


use PHPUnit\Framework\TestCase;

class RycheckyTest extends TestCase
{

    public function testLocale()
    {
        $this->assertEquals(strlen(Language::getLocale()), 2);
    }


    public function testCertificateList()
    {
        $list = CertificateList::fetchCertificateList();
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Certificate', $list[0]);
    }


    public function testExperienceList()
    {
        $list = ExperienceList::fetchExperienceList();
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Experience', $list[0]);
    }


    public function testHobbyList()
    {
        $list = HobbyList::fetchHobbyList();
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Hobby', $list[0]);
    }


    public function testPortfolioList()
    {
        $list = PortfolioList::fetchPortfolioList();
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Portfolio', $list[0]);
    }


    public function testSkillList()
    {
        $selected = SkillListType::selectedSkillType();
        $this->assertInternalType('string', $selected);

        $list = SkillList::fetchSkillListByType($selected);
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Skill', $list[0]);
    }


    public function testSocialList()
    {
        $list = SocialList::fetchSocialList();
        $this->assertInternalType('array', $list);
        $this->assertInstanceOf('Social', $list[0]);
    }

}