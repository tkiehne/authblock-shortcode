<?php

namespace Fosforus\AuthBlockShortcode\View\Shortcodes;

use SilverStripe\View\Parsers\ShortcodeHandler;
use SilverStripe\View\Parsers\ShortcodeParser;
use SilverStripe\Security\Permission;
use SilverStripe\Security\Security;

/**
 * Provider for the [authblock] shortcode tag used to determine logged-in state
 * in the HTML Editor field.
 * Provides the html needed for the frontend and the editor field itself.
 */
class AuthBlockShortcodeProvider implements ShortcodeHandler
{

    /**
     * Gets the list of shortcodes provided by this handler
     *
     * @return mixed
     */
    public static function get_shortcodes()
    {
        return array('authblock');
    }

    /**
     * AuthBlock shortcode parser
     *
     * @param array $arguments
     * @param string $content
     * @param ShortcodeParser $parser
     * @param string $shortcode
     * @param array $extra
     *
     * @return string
     */
    public static function handle_shortcode($arguments, $content, $parser, $shortcode, $extra = array())
    {
        $ret = false;
        if (isset($arguments['auth']) && strtolower($arguments['auth']) == 'false')
        {
            if (empty(Security::getCurrentUser()))
            {
                $ret = true;
            }
        }
        elseif (!isset($arguments['auth']) || strtolower($arguments['auth']) == 'true')
        {
            if (Security::getCurrentUser()) 
            {
                if (isset($arguments['perm']))
                {
                    if (Permission::check($arguments['perm'])) 
                    {
                        $ret = true;
                    }
                }
                else 
                {
                    $ret = true;
                }
            }
        }


        if ($ret)
        {
            return $content; // parse this also?
        }

        return '';
    }

}