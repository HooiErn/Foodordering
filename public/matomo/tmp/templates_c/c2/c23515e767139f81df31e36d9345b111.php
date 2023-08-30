<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @TwoFactorAuth/userSettings.twig */
class __TwigTemplate_be2ac54f91f04f5357d1b8d02ec2f144 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div piwik-content-block
     content-title=\"";
        // line 2
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_TwoFactorAuthentication"), "html", null, true);
        echo " (";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_TwoFAShort"), "html", null, true);
        echo ")\" class=\"userSettings2FA\">

    <p>
        ";
        // line 5
        echo $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_TwoFactorAuthenticationIntro", "<a href=\"https://matomo.org/faq/general/faq_27245\" rel=\"noreferrer noopener\">", "</a>");
        echo "
    </p>

    ";
        // line 8
        if ((isset($context["isEnabled"]) || array_key_exists("isEnabled", $context) ? $context["isEnabled"] : (function () { throw new RuntimeError('Variable "isEnabled" does not exist.', 8, $this->source); })())) {
            // line 9
            echo "        <p><strong class=\"twoFaStatusEnabled\">";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_TwoFactorAuthenticationIsEnabled"), "html", null, true);
            echo "</strong></p>

        <p>
        ";
            // line 12
            if ((isset($context["isForced"]) || array_key_exists("isForced", $context) ? $context["isForced"] : (function () { throw new RuntimeError('Variable "isForced" does not exist.', 12, $this->source); })())) {
                // line 13
                echo "            ";
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_TwoFactorAuthenticationRequired"), "html", null, true);
                echo "
            <br />
            <br />
            <a class=\"btn btn-link enable2FaLink\" href=\"";
                // line 16
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "TwoFactorAuth", "action" => "setupTwoFactorAuth"]), "html", null, true);
                echo "\">";
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_ConfigureDifferentDevice"), "html", null, true);
                echo "</a>
        ";
            } else {
                // line 18
                echo "            <a class=\"btn btn-link enable2FaLink\" href=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "TwoFactorAuth", "action" => "setupTwoFactorAuth"]), "html", null, true);
                echo "\">";
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_ConfigureDifferentDevice"), "html", null, true);
                echo "</a>
            <a href=\"";
                // line 19
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "TwoFactorAuth", "action" => "disableTwoFactorAuth", "disableNonce" => (isset($context["disableNonce"]) || array_key_exists("disableNonce", $context) ? $context["disableNonce"] : (function () { throw new RuntimeError('Variable "disableNonce" does not exist.', 19, $this->source); })())]), "html", null, true);
                echo "\" style=\"display:none;\" id=\"disable2fa\">disable2fa</a>
            <input type=\"button\"
                   class=\"btn btn-link disable2FaLink\"
                   onclick=\"twoFactorAuth.confirmDisable2FA('";
                // line 22
                echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, (isset($context["disableNonce"]) || array_key_exists("disableNonce", $context) ? $context["disableNonce"] : (function () { throw new RuntimeError('Variable "disableNonce" does not exist.', 22, $this->source); })()), "url"), "html", null, true);
                echo "');\"
                   value=\"";
                // line 23
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_DisableTwoFA"), "html", null, true);
                echo "\">
        ";
            }
            // line 25
            echo "            <a class=\"btn btn-link showRecoveryCodesLink\" href=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "TwoFactorAuth", "action" => "showRecoveryCodes"]), "html", null, true);
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_ShowRecoveryCodes"), "html", null, true);
            echo "</a>
        </p>
    ";
        } else {
            // line 28
            echo "        <p><strong>";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_TwoFactorAuthenticationIsDisabled"), "html", null, true);
            echo "</strong>
            <br />
            <br />
           <a class=\"btn btn-link enable2FaLink\" href=\"";
            // line 31
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "TwoFactorAuth", "action" => "setupTwoFactorAuth"]), "html", null, true);
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_EnableTwoFA"), "html", null, true);
            echo "</a>
        </p>
    ";
        }
        // line 34
        echo "
    <div id=\"confirmDisable2FA\" class=\"ui-confirm\">
        <h2>";
        // line 36
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("TwoFactorAuth_ConfirmDisableTwoFA"), "html", null, true);
        echo "</h2>
        <input role=\"yes\" type=\"button\" value=\"";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Yes"), "html", null, true);
        echo "\"/>
        <input role=\"no\" type=\"button\" value=\"";
        // line 38
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_No"), "html", null, true);
        echo "\"/>
    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@TwoFactorAuth/userSettings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 38,  133 => 37,  129 => 36,  125 => 34,  117 => 31,  110 => 28,  101 => 25,  96 => 23,  92 => 22,  86 => 19,  79 => 18,  72 => 16,  65 => 13,  63 => 12,  56 => 9,  54 => 8,  48 => 5,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div piwik-content-block
     content-title=\"{{ 'TwoFactorAuth_TwoFactorAuthentication'|translate }} ({{ 'TwoFactorAuth_TwoFAShort'|translate }})\" class=\"userSettings2FA\">

    <p>
        {{ 'TwoFactorAuth_TwoFactorAuthenticationIntro'|translate('<a href=\"https://matomo.org/faq/general/faq_27245\" rel=\"noreferrer noopener\">', '</a>')|raw }}
    </p>

    {% if isEnabled %}
        <p><strong class=\"twoFaStatusEnabled\">{{ 'TwoFactorAuth_TwoFactorAuthenticationIsEnabled'|translate }}</strong></p>

        <p>
        {% if isForced %}
            {{ 'TwoFactorAuth_TwoFactorAuthenticationRequired'|translate }}
            <br />
            <br />
            <a class=\"btn btn-link enable2FaLink\" href=\"{{ linkTo({'module': 'TwoFactorAuth', 'action': 'setupTwoFactorAuth'}) }}\">{{ 'TwoFactorAuth_ConfigureDifferentDevice'|translate }}</a>
        {% else %}
            <a class=\"btn btn-link enable2FaLink\" href=\"{{ linkTo({'module': 'TwoFactorAuth', 'action': 'setupTwoFactorAuth'}) }}\">{{ 'TwoFactorAuth_ConfigureDifferentDevice'|translate }}</a>
            <a href=\"{{ linkTo({'module': 'TwoFactorAuth', 'action': 'disableTwoFactorAuth', 'disableNonce': disableNonce}) }}\" style=\"display:none;\" id=\"disable2fa\">disable2fa</a>
            <input type=\"button\"
                   class=\"btn btn-link disable2FaLink\"
                   onclick=\"twoFactorAuth.confirmDisable2FA('{{ disableNonce|e('url') }}');\"
                   value=\"{{ 'TwoFactorAuth_DisableTwoFA'|translate }}\">
        {% endif %}
            <a class=\"btn btn-link showRecoveryCodesLink\" href=\"{{ linkTo({'module': 'TwoFactorAuth', 'action': 'showRecoveryCodes'}) }}\">{{ 'TwoFactorAuth_ShowRecoveryCodes'|translate }}</a>
        </p>
    {% else %}
        <p><strong>{{ 'TwoFactorAuth_TwoFactorAuthenticationIsDisabled'|translate }}</strong>
            <br />
            <br />
           <a class=\"btn btn-link enable2FaLink\" href=\"{{ linkTo({'module': 'TwoFactorAuth', 'action': 'setupTwoFactorAuth'}) }}\">{{ 'TwoFactorAuth_EnableTwoFA'|translate }}</a>
        </p>
    {% endif %}

    <div id=\"confirmDisable2FA\" class=\"ui-confirm\">
        <h2>{{ 'TwoFactorAuth_ConfirmDisableTwoFA'|translate }}</h2>
        <input role=\"yes\" type=\"button\" value=\"{{ 'General_Yes'|translate }}\"/>
        <input role=\"no\" type=\"button\" value=\"{{ 'General_No'|translate }}\"/>
    </div>

</div>
", "@TwoFactorAuth/userSettings.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/TwoFactorAuth/templates/userSettings.twig");
    }
}
