@if($authenticationMethod === 'OIDC')
    <form class="form-column" method="post" id="loginForm-OIDC" action="/req/login-oidc">
        @csrf
        <button id="loginButton" class="btn-lg align-end top-gap-1">{{ $translation['Login'] }}</button>
    </form>
@elseif($authenticationMethod === 'LDAP' || $authenticationMethod === 'TestAuth')
    <form class="form-column" id="loginForm-LDAP">
        @csrf
        <label for="account">{{ $translation["username"] }}</label>
        <input type="text" name="account" id="account" onkeypress="onLoginKeydown(event)">
        <label for="password">{{ $translation["password"] }}</label>
        <input type="password" name="password" id="password" onkeypress="onLoginKeydown(event)">
    </form>
    <div id="login-Button-panel">
        <div id="login-message"></div>
        <button id="loginButton" class="btn-lg-fill align-end top-gap-1" type="button" onclick="LoginLDAP()">{{ $translation['Login'] }}</button>
    </div>
@elseif($authenticationMethod === 'Shibboleth')
	<form class="form-column" method="post" id="loginForm-Shib" action="/req/login-shibboleth">
		<select id="idpSelectSelector" name="entityID" style="width: 100%;">
			<option id="noselect" value="#">W&auml;hlen Sie Ihre Institution aus...</option>
<!--			<optgroup label="Hochschulen f&uuml;r angewandte Wissenschaften">
				<option value="Shibboleth.sso/Login?entityID=https://idp.hwg-lu.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Hochschule f&uuml;r Wirtschaft und Gesellschaft Ludwigshafen</option>
				<option value="Shibboleth.sso/Login?entityID=https://shibboleth.hs-kl.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Hochschule Kaiserslautern</option>
				<option value="Shibboleth.sso/Login?entityID=https://idp.hs-koblenz.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Hochschule Koblenz</option>
				<option value="Shibboleth.sso/Login?entityID=https://srv-idp-001.hs-mainz.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Hochschule Mainz</option>
				<option value="Shibboleth.sso/Login?entityID=https://idp.fh-trier.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Hochschule Trier</option>
				<option value="Shibboleth.sso/Login?entityID=https://ssoserver.hs-worms.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Hochschule Worms</option>
				<option value="Shibboleth.sso/Login?entityID=https://login.th-bingen.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Technische Hochschule Bingen</option>
			</optgroup>
-->			<optgroup label="Universit&auml;ten">
				<option value="Shibboleth.sso/Login?entityID=https://idptest.rhrk.uni-kl.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">RPTU Kaiserslautern-Landau</option>
<!--				<option value="Shibboleth.sso/Login?entityID=https://shibboleth2.uni-koblenz.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Universit&auml;t Koblenz</option>
				<option value="Shibboleth.sso/Login?entityID=https://shib.uni-mainz.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Universit&auml;t Mainz</option>
				<option value="Shibboleth.sso/Login?entityID=https://aai.dhv-speyer.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Universit&auml;t Speyer</option>
				<option value="Shibboleth.sso/Login?entityID=https://shibboleth.uni-trier.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">Universit&auml;t Trier</option>
-->		</optgroup>
				<optgroup label="Partner">
				<option value="Shibboleth.sso/Login?entityID=https://kraftwerk.vcrp.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">VCRP</option>
<!--				<option value="Shibboleth.sso/Login?entityID=https://shib.pthv.de/idp/shibboleth&target=https://hawki2-dev.vcrp.de/req/login-shibboleth">VPU</option>
-->			</optgroup>
		</select>
        @csrf
        <button id="loginButton" class="btn-lg-fill align-end top-gap-1" type="submit" name="submit">{{ $translation['Login'] }}</button >
    </form>
<!--    <form class="form-column" method="post" id="loginForm-Shib" action="/req/login-shibboleth">

    </form>-->
@else
    No authentication method defined
@endif
