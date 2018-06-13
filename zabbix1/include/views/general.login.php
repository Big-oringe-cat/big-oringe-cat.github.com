<?php
/*
** Zabbix
** Copyright (C) 2001-2017 Zabbix SIA
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 2 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/


define('ZBX_PAGE_NO_HEADER', 1);
define('ZBX_PAGE_NO_FOOTER', 1);
$hash = md5($_COOKIE["cookie"]);
$message = CHtml::encode(getRequest('message', '')) ;
// remove debug code for login form message, trimming not in regex to relay only on [ ] in debug message.
$message = trim(preg_replace('/\[.*\]/', '', $message));

require_once dirname(__FILE__).'/../page_header.php';

$error = ($message !== '') ? (new CDiv($message))->addClass(ZBX_STYLE_RED) : null;
$guest = (CWebUser::$data['userid'] > 0)
	? (new CListItem(['', new CLink('', ZBX_DEFAULT_URL)]))
		->addClass(ZBX_STYLE_SIGN_IN_TXT)
	: null;

global $ZBX_SERVER_NAME;

(new CDiv([
	(isset($ZBX_SERVER_NAME) && $ZBX_SERVER_NAME !== '')
		? (new CDiv($ZBX_SERVER_NAME))->addClass(ZBX_STYLE_SERVER_NAME)
		: null,
	(new CDiv([
		(new CDiv())->addClass(ZBX_STYLE_SIGNIN_LOGO),
		(new CForm())
			->cleanItems()
			->addItem(hasRequest('request') ? new CVar('request', getRequest('request')) : null)
			->addItem(
				(new CList())
					->addItem([
						new CLabel(_('Username'), 'name'),
						(new CTextBox('name'))->setAttribute('autofocus', 'autofocus'),
						$error
					])
					->addItem([new CLabel(_('Password'), 'password'), (new CTextBox('password'))->setType('password')])
                                        ->addItem((new CTextBox('hash'))->setType('hidden') 
                                                                        ->setAttribute('value', $hash))
					->addItem(
						new CLabel([
							(new CCheckBox('autologin'))->setChecked(getRequest('autologin', 1) == 1),
							_('Remember me for 30 days')
						], 'autologin')
					)
					->addItem(new CSubmit('enter', _('Sign in'),'SubmitForm()'))
					->addItem($guest)
			)
	]))->addClass(ZBX_STYLE_SIGNIN_CONTAINER),
	(new CDiv([
		(new CLink(_('版本号:3.2.6')))
			->setTarget('_blank')
			->addClass(ZBX_STYLE_GREY)
			->addClass(ZBX_STYLE_LINK_ALT),
	//	'&nbsp;&nbsp;•&nbsp;&nbsp;',
	// (new CLink(_('Support'), 'http://www.zabbix.com/support.php'))
	//		->setTarget('_blank')
	//		->addClass(ZBX_STYLE_GREY)
	//		->addClass(ZBX_STYLE_LINK_ALT)
	]))->addClass(ZBX_STYLE_SIGNIN_LINKS)
]))
	->addClass(ZBX_STYLE_ARTICLE)
	->show();

makePageFooter(false)->show();
?>
<script>
    function Base64() {

        // private property
        _keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";

        // public method for encoding
        this.encode = function (input) {
                var output = "";
                var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
                var i = 0;
                input = _utf8_encode(input);
                while (i < input.length) {
                        chr1 = input.charCodeAt(i++);
                        chr2 = input.charCodeAt(i++);
                        chr3 = input.charCodeAt(i++);
                        enc1 = chr1 >> 2;
                        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                        enc4 = chr3 & 63;
                        if (isNaN(chr2)) {
                                enc3 = enc4 = 64;
                        } else if (isNaN(chr3)) {
                                enc4 = 64;
                        }
                        output = output +
                        _keyStr.charAt(enc1) + _keyStr.charAt(enc2) +
                        _keyStr.charAt(enc3) + _keyStr.charAt(enc4);
                }
                return output;
        }
        // private method for UTF-8 encoding
        _utf8_encode = function (string) {
                string = string.replace(/\r\n/g,"\n");
                var utftext = "";
                for (var n = 0; n < string.length; n++) {
                        var c = string.charCodeAt(n);
                        if (c < 128) {
                                utftext += String.fromCharCode(c);
                        } else if((c > 127) && (c < 2048)) {
                                utftext += String.fromCharCode((c >> 6) | 192);
                                utftext += String.fromCharCode((c & 63) | 128);
                        } else {
                                utftext += String.fromCharCode((c >> 12) | 224);
                                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                                utftext += String.fromCharCode((c & 63) | 128);
                        }

                }
                return utftext;
        }
}
 function SubmitForm(){
        var b = new Base64();
        document.getElementById("name").value=b.encode(document.getElementById("name").value);
        document.getElementById("name").type="password";
        document.getElementById("password").value=b.encode(document.getElementById("password").value);
    }

</script>
</body>
</html>
