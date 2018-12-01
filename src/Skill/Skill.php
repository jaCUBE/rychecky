<?php

/**
 * Skill entitny.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class Skill
 */

namespace Rychecky\Skill;

use Rychecky\Entity;
use Rychecky\Language;

class Skill extends Entity
{
    public const DEFAULT_SKILL_TYPE = 'webdev';

    /**
     * @var int $skillId Skill ID
     */
    private $skillId;

    /**
     * @var string $type Skill type
     */
    private $type;

    /**
     * @var string $name Skill name
     */
    private $name;

    /**
     * @var int $value Skill rank (0-100)
     */
    private $value;

    /**
     * @var string $detail Detail description of skill
     */
    private $detail;

    /**
     * Skill constructor.
     * @param array $data Row fetched from database
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->skillId = (int)$data['skill_id'];
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
     * @return int
     */
    public function getSkillId(): int
    {
        return $this->skillId;
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
