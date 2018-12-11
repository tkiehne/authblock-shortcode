# AuthBlock Shortcode Module

[![Version](http://img.shields.io/packagist/v/fosforus/authblock-shortcode.svg?style=flat)](https://packagist.org/packages/fosforus/authblock-shortcode)
[![License](http://img.shields.io/packagist/l/fosforus/authblock-shortcode.svg?style=flat)](LICENSE)

## Requirements

* SilverStripe CMS 4.2+

## Installation

```
composer require fosforus/authblock-shortcode
```

## Usage

In any shortcode-enabled editor field (HTMLEditor, et al.), place this shortcode around blocks of content you wish to "gate" based on the logged-in state of the user. E.g.: to show a specific block of content only to a user that is currently logged in:

```
[authblock auth="true"]Hello, member![/authblock]
```

To show content only to a logged-out (anonymous) user:

```
[authblock auth="false"]You may log in <a href="/Security/login">here</a>.[/authblock]
```

Note that due to [shortcode nesting restrictions](https://docs.silverstripe.org/en/4/developer_guides/extending/shortcodes/#limitations), you may not place shortcodes within the `authblock`. For more complex situations, consider creating custom template variables in your Controller(s).

You may also set a single permission to further qualify the authentication check, e.g.:

```
[authblock auth="true" perm="CMS_ACCESS"]Edit the site <a href="/admin/pages">here</a>.[/authblock]
```

In this case, if the user is not authenticated with the site or the user doesn't have access to any of the CMS (via `CMS_ACCESS_*` permissions), the block content will not show. Again, for more complex permission checks, extend your Controller(s).