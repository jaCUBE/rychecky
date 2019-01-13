<?php

namespace Rychecky\Entity;

use Doctrine\ORM\Mapping as ORM;
use Rychecky\EntityDoctrine;

/**
 * @ORM\Entity
 * @ORM\Table(name="skills", indexes={
 *     @ORM\Index(name="skillsIdxValue", columns={"value"}),
 *     @ORM\Index(name="skillsIdxLocale", columns={"locale"}),
 * })
 */
class Skill extends EntityDoctrine
{
    public const DEFAULT_SKILL_TYPE = 'webdev';

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $value;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $detail;

    /**
     * Skill constructor.
     * @param array $data
     * @throws \Exception
     */
    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->type = (string)$data['type'];
        $this->name = (string)$data['name'];
        $this->value = (int)$data['value'];
        $this->detail = (string)$data['detail'];
    }

    /**
     * Provide ordered list of skill types in an array.
     * @return string[] A ordered list of skill types
     */
    public static function getSkillTypesList(): array
    {
        // TODO: Refactor to Consistency Enum?
        // Ordered skill types
        if ('cs' === Language::getLocale()) {
            $skillTypeList = ['Webdev', 'ICT', 'Jazyky', 'Ostatní'];
        } else {
            $skillTypeList = ['Webdev', 'ICT', 'Languages', 'Others'];
        }

        return array_combine($skillTypeList, $skillTypeList); // Key = value array
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }
}
