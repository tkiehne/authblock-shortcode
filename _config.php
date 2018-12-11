<?php
use Fosforus\AuthBlockShortcode\View\Shortcodes\AuthBlockShortcodeProvider;
use SilverStripe\View\Parsers\ShortcodeParser;
ShortcodeParser::get('default')->register('authblock', [AuthBlockShortcodeProvider::class, 'handle_shortcode']);