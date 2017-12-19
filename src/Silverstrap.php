<?php

namespace eNTiDi\SilverStrap;

use SilverStripe\Config;
use SilverStripe\Control\Director;
use SilverStripe\View\ArrayData;
use SilverStripe\View\TemplateGlobalProvider;

/**
 * Provide access to the layout used by the SilverStrap theme.
 *
 * @package silverstrap
 * @subpackage code
 */
class Silverstrap extends Object implements TemplateGlobalProvider
{
    /**
     * @config
     * SilverStrap layouts.
     */
    private static $layouts;


    /**
     * Return the proper layout, depending on the controller.
     *
     * Check `docs/en/usage.md` to know the exact algorithm used to
     * look up the proper layout.
     */
    public static function silverstrap_settings()
    {
        $controller = Director::get_current_page();
        $layouts    = Config::inst()->get(__CLASS__, 'layouts');
        if (array_key_exists($controller->SilverstrapLayout, $layouts)) {
            $layout = $controller->SilverstrapLayout;
        } elseif (array_key_exists($controller->class, $layouts)) {
            $layout = $controller->class;
        } else {
            $layout = 'default';
        }
        return ArrayData::create($layouts[$layout]);
    }

    public static function get_template_global_variables()
    {
        return array(
            'Silverstrap' => 'silverstrap_settings',
        );
    }
}
