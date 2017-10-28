<?php
class Entity
{
    /**
     * Entity name
     *
     * @var string
     */
    private $name;

    /**
     * Entity value
     *
     * @var string
     */
    private $value;

    /**
     * Entity items
     *
     * @var array of entities
     */
    private $items;

    /**
     * Return entity name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set entity name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Return entity value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set entity value
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Return all entity items
     *
     * @return array of items
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * Set all entity items
     *
     * @param array $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }
}
