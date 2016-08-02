<?php

/**
 * A new TabSet that does not pull in hardcoded javascript or CSS crap.
 *
 * @package silverstrap
 * @subpackage code
 */
class SilverstrapTabSet extends TabSet
{
    /**
     * This is just a pristine copy of TabSet::FieldHolder without all
     * the Requirements calls.
     */
    public function FieldHolder($properties = array())
    {
        $obj = $properties ? $this->customise($properties) : $this;
        return $obj->renderWith($this->getTemplates());
    }
}
