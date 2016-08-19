<?php

/**
 * A new SelectionGroup that does not pull in hardcoded javascript or CSS crap.
 *
 * @package silverstrap
 * @subpackage code
 */
class SilverstrapSelectionGroup extends SelectionGroup
{
    /**
     * This is just a pristine copy of SelectionGroup::FieldHolder
     * without all the Requirements calls.
     */
    public function FieldHolder($properties = array())
    {
        $obj = $properties ? $this->customise($properties) : $this;
        return $obj->renderWith($this->getTemplates());
    }
}
