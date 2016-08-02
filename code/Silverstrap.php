<?php

/**
 * Provide a set of tags to be used by the silverstrap templates.
 *
 * An example are the default classes for input and label elements on
 * the forms.
 *
 * @package silverstrap
 * @subpackage code
 */
class Silverstrap extends Object implements TemplateGlobalProvider
{
    /**
     * @config
     */
    private static $classes;


    public static function silverstrap_settings()
    {
        $data = Config::inst()->get(__CLASS__, 'classes');
        return ArrayData::create($data);
    }

    public static function get_template_global_variables()
    {
        return array(
            'Silverstrap' => 'silverstrap_settings',
        );
    }
}
