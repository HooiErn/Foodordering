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

/* @SitesManager/siteWithoutData.twig */
class __TwigTemplate_2554fcc43caedccdd53857935756706a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'notification' => [$this, 'block_notification'],
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
        // line 11
        $context["bodyId"] = "site-without-data";
        // line 1
        $this->parent = $this->loadTemplate("dashboard.twig", "@SitesManager/siteWithoutData.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_notification($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    ";
        $this->loadTemplate("@CoreHome/_notifications.twig", "@SitesManager/siteWithoutData.twig", 4)->display($context);
    }

    // line 7
    public function block_topcontrols($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        $this->loadTemplate("@CoreHome/_siteSelectHeader.twig", "@SitesManager/siteWithoutData.twig", 8)->display($context);
    }

    // line 13
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "
    <script type=\"text/javascript\" charset=\"utf-8\">
        \$(document).ready(function () {
            \$('<div />').insertAfter('.site-without-data').liveWidget({
                interval: 1000,
                onUpdate: function () {
                    // reload page as soon as a visit was detected
                    broadcast.propagateNewPage('date=today');
                },
                dataUrlParams: {
                    module: 'Live',
                    action: 'getLastVisitsStart'
                }
            });
        });
    </script>

    <div class=\"site-without-data\">
            <h1 id=\"start-tracking-data-header\">
                ";
        // line 33
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataStartTrackingDataHeader"), "html", null, true);
        echo "
            </h1>
            <p>";
        // line 35
        echo $this->env->getFilter('translate')->getCallable()((isset($context["siteWithoutDataStartTrackingTranslationKey"]) || array_key_exists("siteWithoutDataStartTrackingTranslationKey", $context) ? $context["siteWithoutDataStartTrackingTranslationKey"] : (function () { throw new RuntimeError('Variable "siteWithoutDataStartTrackingTranslationKey" does not exist.', 35, $this->source); })()), (((("<a rel=\"noreferrer noopener\" target=\"_blank\" class=\"emailTrackingCode\" href=\"mailto:?subject=" . \Piwik\piwik_escape_filter($this->env, twig_urlencode_filter($this->env->getFilter('translate')->getCallable()("SitesManager_EmailInstructionsSubject")), "html_attr")) . "&body=") . \Piwik\piwik_escape_filter($this->env, twig_urlencode_filter((isset($context["emailBody"]) || array_key_exists("emailBody", $context) ? $context["emailBody"] : (function () { throw new RuntimeError('Variable "emailBody" does not exist.', 35, $this->source); })())), "html_attr")) . "\">"), "</a>", (("<a rel=\"noreferrer noopener\" target=\"_blank\" href=\"" . (isset($context["inviteUserLink"]) || array_key_exists("inviteUserLink", $context) ? $context["inviteUserLink"] : (function () { throw new RuntimeError('Variable "inviteUserLink" does not exist.', 35, $this->source); })())) . "\">"), "</a>");
        echo "</p>
            <p>";
        // line 36
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataStartTrackingDataDescriptionLine2", (("<a rel=\"noreferrer noopener\" class=\"ignoreSitesWithoutData\" href=\"" . $this->env->getFunction('linkTo')->getCallable()(["module" => "SitesManager", "action" => "ignoreNoDataMessage"])) . "\">"), "</a>");
        echo "</p>
            <p>&nbsp;</p>

            <div piwik-widget-loader='{\"module\":\"SitesManager\",\"action\":\"siteWithoutDataTabs\"}' loading-message=\"";
        // line 39
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_DetectingYourSite"), "html_attr");
        echo "...\"></div>

            ";
        // line 41
        ob_start();
        echo $this->env->getFunction('postEvent')->getCallable()("Template.siteWithoutData.afterIntro");
        $context["afterIntroEventContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 42
        echo "            <div class=\"no-data-footer row\">
                ";
        // line 43
        if ((isset($context["afterIntroEventContent"]) || array_key_exists("afterIntroEventContent", $context) ? $context["afterIntroEventContent"] : (function () { throw new RuntimeError('Variable "afterIntroEventContent" does not exist.', 43, $this->source); })())) {
            // line 44
            echo "                    <hr/>
                ";
        }
        // line 46
        echo "                ";
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["afterIntroEventContent"]) || array_key_exists("afterIntroEventContent", $context) ? $context["afterIntroEventContent"] : (function () { throw new RuntimeError('Variable "afterIntroEventContent" does not exist.', 46, $this->source); })()), "html", null, true);
        echo "
            </div>
            ";
        // line 48
        echo $this->env->getFunction('postEvent')->getCallable()("Template.siteWithoutData.afterTrackingHelp");
        echo "
    </div>

";
    }

    public function getTemplateName()
    {
        return "@SitesManager/siteWithoutData.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 48,  127 => 46,  123 => 44,  121 => 43,  118 => 42,  114 => 41,  109 => 39,  103 => 36,  99 => 35,  94 => 33,  73 => 14,  69 => 13,  64 => 8,  60 => 7,  55 => 4,  51 => 3,  46 => 1,  44 => 11,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"dashboard.twig\" %}

{% block notification %}
    {% include \"@CoreHome/_notifications.twig\" %}
{% endblock %}

{% block topcontrols %}
    {% include \"@CoreHome/_siteSelectHeader.twig\" %}
{% endblock %}

{% set bodyId = 'site-without-data' %}

{% block content %}

    <script type=\"text/javascript\" charset=\"utf-8\">
        \$(document).ready(function () {
            \$('<div />').insertAfter('.site-without-data').liveWidget({
                interval: 1000,
                onUpdate: function () {
                    // reload page as soon as a visit was detected
                    broadcast.propagateNewPage('date=today');
                },
                dataUrlParams: {
                    module: 'Live',
                    action: 'getLastVisitsStart'
                }
            });
        });
    </script>

    <div class=\"site-without-data\">
            <h1 id=\"start-tracking-data-header\">
                {{ 'SitesManager_SiteWithoutDataStartTrackingDataHeader'|translate }}
            </h1>
            <p>{{ siteWithoutDataStartTrackingTranslationKey|translate('<a rel=\"noreferrer noopener\" target=\"_blank\" class=\"emailTrackingCode\" href=\"mailto:?subject=' ~ 'SitesManager_EmailInstructionsSubject'|translate|url_encode|e('html_attr') ~ '&body=' ~ emailBody|url_encode|e('html_attr') ~ '\">', '</a>', '<a rel=\"noreferrer noopener\" target=\"_blank\" href=\"' ~ inviteUserLink ~'\">', '</a>')|raw }}</p>
            <p>{{ 'SitesManager_SiteWithoutDataStartTrackingDataDescriptionLine2'|translate('<a rel=\"noreferrer noopener\" class=\"ignoreSitesWithoutData\" href=\"' ~ linkTo({module: 'SitesManager', action: 'ignoreNoDataMessage'}) ~'\">', '</a>')|raw }}</p>
            <p>&nbsp;</p>

            <div piwik-widget-loader='{\"module\":\"SitesManager\",\"action\":\"siteWithoutDataTabs\"}' loading-message=\"{{ 'SitesManager_DetectingYourSite'|translate|e('html_attr') }}...\"></div>

            {% set afterIntroEventContent %}{{ postEvent('Template.siteWithoutData.afterIntro') }}{% endset %}
            <div class=\"no-data-footer row\">
                {% if afterIntroEventContent %}
                    <hr/>
                {% endif %}
                {{ afterIntroEventContent }}
            </div>
            {{ postEvent('Template.siteWithoutData.afterTrackingHelp') }}
    </div>

{% endblock %}
", "@SitesManager/siteWithoutData.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/SitesManager/templates/siteWithoutData.twig");
    }
}
