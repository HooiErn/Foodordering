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

/* @CorePluginsAdmin/tagManagerTeaser.twig */
class __TwigTemplate_1cd97003dae3c40d2a2d04771af7d10f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'topcontrols' => [$this, 'block_topcontrols'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "dashboard.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("dashboard.twig", "@CorePluginsAdmin/tagManagerTeaser.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_topcontrols($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "<div class=\"activateTagManager\">
    <div class=\"row\">
        <div class=\"col s12\" style=\"text-align: center;\">
            <h2>";
        // line 10
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_TagManagerNowAvailableTitle"), "html", null, true);
        echo "</h2>
            <p>";
        // line 11
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_TagManagerNowAvailableSubtitle"), "html", null, true);
        echo "</p>
        </div>
    </div>
    ";
        // line 14
        ob_start();
        // line 15
        echo "    <div class=\"row\">
        <div class=\"col s12\">
            <div style=\"text-align: center;\">
                ";
        // line 18
        if ((isset($context["isSuperUser"]) || array_key_exists("isSuperUser", $context) ? $context["isSuperUser"] : (function () { throw new RuntimeError('Variable "isSuperUser" does not exist.', 18, $this->source); })())) {
            // line 19
            echo "                    <a href=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "CorePluginsAdmin", "action" => "activate", "nonce" => (isset($context["nonce"]) || array_key_exists("nonce", $context) ? $context["nonce"] : (function () { throw new RuntimeError('Variable "nonce" does not exist.', 19, $this->source); })()), "pluginName" => "TagManager", "redirectTo" => "tagmanager"]), "html", null, true);
            echo "\"
                       class=\"btn activateTagManagerPlugin\"><span class=\"icon-rocket\"></span> ";
            // line 20
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_ActivateTagManagerNow"), "html", null, true);
            echo " <span class=\"icon-rocket\"></span></a>
                ";
        } else {
            // line 22
            echo "                    <a href=\"mailto:";
            echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, (isset($context["contactEmail"]) || array_key_exists("contactEmail", $context) ? $context["contactEmail"] : (function () { throw new RuntimeError('Variable "contactEmail" does not exist.', 22, $this->source); })()), "url"), "html", null, true);
            echo "?subject=";
            echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_TagManagerNowAvailableTitle"), "url"), "html", null, true);
            echo "&body=";
            echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_TagManagerTeaserEmailSuperUserBody", "

", "

", (isset($context["piwikUrl"]) || array_key_exists("piwikUrl", $context) ? $context["piwikUrl"] : (function () { throw new RuntimeError('Variable "piwikUrl" does not exist.', 22, $this->source); })()), "

"), "url"), "html", null, true);
            echo "\"
                       class=\"btn activateTagManagerPlugin\"><span class=\"icon-rocket\"></span> ";
            // line 23
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_TagManagerEmailSuperUserToActivate"), "html", null, true);
            echo " <span class=\"icon-rocket\"></span></a>
                ";
        }
        // line 25
        echo "
                <a href=\"";
        // line 26
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "CorePluginsAdmin", "action" => "disableActivateTagManagerPage"]), "html", null, true);
        echo "\"
                   class=\"btn dontShowAgainBtn\"><span class=\"icon-hide\"></span>
                    ";
        // line 28
        if ((isset($context["isSuperUser"]) || array_key_exists("isSuperUser", $context) ? $context["isSuperUser"] : (function () { throw new RuntimeError('Variable "isSuperUser" does not exist.', 28, $this->source); })())) {
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_TagManagerTeaserHideSuperUser"), "html", null, true);
        } else {
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_TagManagerTeaserHideNonSuperUser"), "html", null, true);
        }
        // line 29
        echo "                </a>
            </div>
        </div>
    </div>
    ";
        $context["actionBlock"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 34
        echo "    ";
        echo (isset($context["actionBlock"]) || array_key_exists("actionBlock", $context) ? $context["actionBlock"] : (function () { throw new RuntimeError('Variable "actionBlock" does not exist.', 34, $this->source); })());
        echo "
    <div class=\"row\">
        <div class=\"col ";
        // line 36
        if ((isset($context["isSuperUser"]) || array_key_exists("isSuperUser", $context) ? $context["isSuperUser"] : (function () { throw new RuntimeError('Variable "isSuperUser" does not exist.', 36, $this->source); })())) {
            echo "l4";
        } else {
            echo "l6";
        }
        echo " m12 s12\">
            <div piwik-content-block content-title=\"";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_WhatIsTagManager"), "html", null, true);
        echo "\">
                <p>
                    ";
        // line 39
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_WhatIsTagManagerDetails1"), "html", null, true);
        echo "<br /><br />
                    ";
        // line 40
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_WhatIsTagManagerDetails2"), "html", null, true);
        echo "<br /><br />
                    <a href=\"https://matomo.org/docs/tag-manager\" rel=\"noreferrer noopener\">";
        // line 41
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_TagManagerLearnMoreInUserGuide"), "html", null, true);
        echo "</a>
                </p>
            </div>
        </div>
        <div class=\"col ";
        // line 45
        if ((isset($context["isSuperUser"]) || array_key_exists("isSuperUser", $context) ? $context["isSuperUser"] : (function () { throw new RuntimeError('Variable "isSuperUser" does not exist.', 45, $this->source); })())) {
            echo "l4";
        } else {
            echo "l6";
        }
        echo " m12 s12\">
            <div piwik-content-block content-title=\"";
        // line 46
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_WhyUsingATagManager"), "html", null, true);
        echo "\">
                <p>
                    ";
        // line 48
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_WhyUsingATagManagerDetails1"), "html", null, true);
        echo "
                    <br /><br />
                    ";
        // line 50
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_WhyUsingATagManagerDetails2"), "html", null, true);
        echo "
                    <br /><br />
                    ";
        // line 52
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_WhyUsingATagManagerDetails3"), "html", null, true);
        echo "
                    <br /><br /><br />
                    <a href=\"https://matomo.org/docs/tag-manager\" rel=\"noreferrer noopener\">";
        // line 54
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_TagManagerLearnMoreInUserGuide"), "html", null, true);
        echo "</a>
                </p>
            </div>
        </div>
        ";
        // line 58
        if ((isset($context["isSuperUser"]) || array_key_exists("isSuperUser", $context) ? $context["isSuperUser"] : (function () { throw new RuntimeError('Variable "isSuperUser" does not exist.', 58, $this->source); })())) {
            // line 59
            echo "            <div class=\"col l4 m12 s12\">
                <div piwik-content-block content-title=\"";
            // line 60
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_AreThereAnyRisks"), "html", null, true);
            echo "\">

                    ";
            // line 62
            echo $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_AreThereAnyRisksDetails1", "<a rel=\"noreferrer noopener\" href=\"https://en.wikipedia.org/wiki/Cross-site_scripting\">", "</a>");
            echo "
                    <br /><br />
                    ";
            // line 64
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_AreThereAnyRisksDetails2"), "html", null, true);
            echo "
                    <br /><br /><br />
                    <a href=\"https://matomo.org/faq/tag-manager/website-security-considerations-when-using-a-tag-manager/\" rel=\"noreferrer noopener\">";
            // line 66
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CorePluginsAdmin_TagManagerLearnMoreInUserGuide"), "html", null, true);
            echo "</a>
                </div>
            </div>
        ";
        }
        // line 70
        echo "    </div>
    ";
        // line 71
        echo (isset($context["actionBlock"]) || array_key_exists("actionBlock", $context) ? $context["actionBlock"] : (function () { throw new RuntimeError('Variable "actionBlock" does not exist.', 71, $this->source); })());
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@CorePluginsAdmin/tagManagerTeaser.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 71,  228 => 70,  221 => 66,  216 => 64,  211 => 62,  206 => 60,  203 => 59,  201 => 58,  194 => 54,  189 => 52,  184 => 50,  179 => 48,  174 => 46,  166 => 45,  159 => 41,  155 => 40,  151 => 39,  146 => 37,  138 => 36,  132 => 34,  125 => 29,  119 => 28,  114 => 26,  111 => 25,  106 => 23,  91 => 22,  86 => 20,  81 => 19,  79 => 18,  74 => 15,  72 => 14,  66 => 11,  62 => 10,  57 => 7,  53 => 6,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'dashboard.twig' %}

{% block topcontrols %}
{% endblock %}

{% block content %}
<div class=\"activateTagManager\">
    <div class=\"row\">
        <div class=\"col s12\" style=\"text-align: center;\">
            <h2>{{ 'CorePluginsAdmin_TagManagerNowAvailableTitle'|translate }}</h2>
            <p>{{ 'CorePluginsAdmin_TagManagerNowAvailableSubtitle'|translate }}</p>
        </div>
    </div>
    {% set actionBlock %}
    <div class=\"row\">
        <div class=\"col s12\">
            <div style=\"text-align: center;\">
                {% if isSuperUser %}
                    <a href=\"{{ linkTo({'module': 'CorePluginsAdmin', 'action': 'activate', 'nonce': nonce, 'pluginName': 'TagManager', 'redirectTo': 'tagmanager'}) }}\"
                       class=\"btn activateTagManagerPlugin\"><span class=\"icon-rocket\"></span> {{ 'CorePluginsAdmin_ActivateTagManagerNow'|translate }} <span class=\"icon-rocket\"></span></a>
                {% else %}
                    <a href=\"mailto:{{ contactEmail|e('url') }}?subject={{ 'CorePluginsAdmin_TagManagerNowAvailableTitle'|translate|e('url') }}&body={{ 'CorePluginsAdmin_TagManagerTeaserEmailSuperUserBody'|translate(\"\\n\\n\", \"\\n\\n\", piwikUrl, \"\\n\\n\")|e('url') }}\"
                       class=\"btn activateTagManagerPlugin\"><span class=\"icon-rocket\"></span> {{ 'CorePluginsAdmin_TagManagerEmailSuperUserToActivate'|translate }} <span class=\"icon-rocket\"></span></a>
                {% endif %}

                <a href=\"{{ linkTo({'module': 'CorePluginsAdmin', 'action': 'disableActivateTagManagerPage'}) }}\"
                   class=\"btn dontShowAgainBtn\"><span class=\"icon-hide\"></span>
                    {% if isSuperUser %}{{ 'CorePluginsAdmin_TagManagerTeaserHideSuperUser'|translate }}{% else %}{{ 'CorePluginsAdmin_TagManagerTeaserHideNonSuperUser'|translate }}{% endif %}
                </a>
            </div>
        </div>
    </div>
    {% endset %}
    {{ actionBlock|raw }}
    <div class=\"row\">
        <div class=\"col {% if isSuperUser %}l4{% else %}l6{% endif %} m12 s12\">
            <div piwik-content-block content-title=\"{{ 'CorePluginsAdmin_WhatIsTagManager'|translate }}\">
                <p>
                    {{ 'CorePluginsAdmin_WhatIsTagManagerDetails1'|translate }}<br /><br />
                    {{ 'CorePluginsAdmin_WhatIsTagManagerDetails2'|translate }}<br /><br />
                    <a href=\"https://matomo.org/docs/tag-manager\" rel=\"noreferrer noopener\">{{ 'CorePluginsAdmin_TagManagerLearnMoreInUserGuide'|translate }}</a>
                </p>
            </div>
        </div>
        <div class=\"col {% if isSuperUser %}l4{% else %}l6{% endif %} m12 s12\">
            <div piwik-content-block content-title=\"{{ 'CorePluginsAdmin_WhyUsingATagManager'|translate }}\">
                <p>
                    {{ 'CorePluginsAdmin_WhyUsingATagManagerDetails1'|translate }}
                    <br /><br />
                    {{ 'CorePluginsAdmin_WhyUsingATagManagerDetails2'|translate }}
                    <br /><br />
                    {{ 'CorePluginsAdmin_WhyUsingATagManagerDetails3'|translate }}
                    <br /><br /><br />
                    <a href=\"https://matomo.org/docs/tag-manager\" rel=\"noreferrer noopener\">{{ 'CorePluginsAdmin_TagManagerLearnMoreInUserGuide'|translate }}</a>
                </p>
            </div>
        </div>
        {% if isSuperUser %}
            <div class=\"col l4 m12 s12\">
                <div piwik-content-block content-title=\"{{ 'CorePluginsAdmin_AreThereAnyRisks'|translate }}\">

                    {{ 'CorePluginsAdmin_AreThereAnyRisksDetails1'|translate('<a rel=\"noreferrer noopener\" href=\"https://en.wikipedia.org/wiki/Cross-site_scripting\">', '</a>')|raw }}
                    <br /><br />
                    {{ 'CorePluginsAdmin_AreThereAnyRisksDetails2'|translate }}
                    <br /><br /><br />
                    <a href=\"https://matomo.org/faq/tag-manager/website-security-considerations-when-using-a-tag-manager/\" rel=\"noreferrer noopener\">{{ 'CorePluginsAdmin_TagManagerLearnMoreInUserGuide'|translate }}</a>
                </div>
            </div>
        {% endif %}
    </div>
    {{ actionBlock|raw }}
</div>
{% endblock %}
", "@CorePluginsAdmin/tagManagerTeaser.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/CorePluginsAdmin/templates/tagManagerTeaser.twig");
    }
}
