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

/* @SitesManager/_trackingCodeEmail.twig */
class __TwigTemplate_04f1afd3b59b01cb4ddf0f08be3d569c extends Template
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
        if ((isset($context["consentManagerName"]) || array_key_exists("consentManagerName", $context) ? $context["consentManagerName"] : (function () { throw new RuntimeError('Variable "consentManagerName" does not exist.', 1, $this->source); })())) {
            // line 2
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_JSTracking_ConsentManagerDetected", (isset($context["consentManagerName"]) || array_key_exists("consentManagerName", $context) ? $context["consentManagerName"] : (function () { throw new RuntimeError('Variable "consentManagerName" does not exist.', 2, $this->source); })()), (isset($context["consentManagerUrl"]) || array_key_exists("consentManagerUrl", $context) ? $context["consentManagerUrl"] : (function () { throw new RuntimeError('Variable "consentManagerUrl" does not exist.', 2, $this->source); })())), "html", null, true);
            echo "

";
        }
        // line 5
        if ((isset($context["ga3Used"]) || array_key_exists("ga3Used", $context) ? $context["ga3Used"] : (function () { throw new RuntimeError('Variable "ga3Used" does not exist.', 5, $this->source); })())) {
            // line 6
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_GADetectedEmail", "Google Analytics 3", "GA", "https://matomo.org/faq/how-to/migrate-from-google-analytics-3-to-matomo/");
            echo "

";
        }
        // line 9
        if ((isset($context["ga4Used"]) || array_key_exists("ga4Used", $context) ? $context["ga4Used"] : (function () { throw new RuntimeError('Variable "ga4Used" does not exist.', 9, $this->source); })())) {
            // line 10
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_GADetectedEmail", "Google Analytics 4", "GA", "https://matomo.org/faq/how-to/migrate-from-google-analytics-4-to-matomo/");
            echo "

";
        }
        // line 13
        if ((isset($context["gtmUsed"]) || array_key_exists("gtmUsed", $context) ? $context["gtmUsed"] : (function () { throw new RuntimeError('Variable "gtmUsed" does not exist.', 13, $this->source); })())) {
            // line 14
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_GTMDetectedEmail", "https://matomo.org/faq/tag-manager/migrating-from-google-tag-manager/");
            echo "

";
        }
        // line 17
        if ((isset($context["cloudflare"]) || array_key_exists("cloudflare", $context) ? $context["cloudflare"] : (function () { throw new RuntimeError('Variable "cloudflare" does not exist.', 17, $this->source); })())) {
            // line 18
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_CloudflareDetectedEmail", "https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/");
            echo "

";
        }
        // line 21
        echo "
";
        // line 22
        if (((isset($context["jsFramework"]) || array_key_exists("jsFramework", $context) ? $context["jsFramework"] : (function () { throw new RuntimeError('Variable "jsFramework" does not exist.', 22, $this->source); })()) == "vue")) {
            // line 23
            echo "    ";
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_VueDetectedEmail", "vue-matomo", "https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/");
            echo "

";
        }
        // line 26
        echo "
";
        // line 27
        if (((isset($context["jsFramework"]) || array_key_exists("jsFramework", $context) ? $context["jsFramework"] : (function () { throw new RuntimeError('Variable "jsFramework" does not exist.', 27, $this->source); })()) == "react")) {
            // line 28
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_ReactDetectedEmail", "https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/");
            echo "

";
        }
        // line 31
        if (((((((isset($context["consentManagerName"]) || array_key_exists("consentManagerName", $context) ? $context["consentManagerName"] : (function () { throw new RuntimeError('Variable "consentManagerName" does not exist.', 31, $this->source); })()) || (isset($context["ga3Used"]) || array_key_exists("ga3Used", $context) ? $context["ga3Used"] : (function () { throw new RuntimeError('Variable "ga3Used" does not exist.', 31, $this->source); })())) || (isset($context["ga4Used"]) || array_key_exists("ga4Used", $context) ? $context["ga4Used"] : (function () { throw new RuntimeError('Variable "ga4Used" does not exist.', 31, $this->source); })())) || (isset($context["gtmUsed"]) || array_key_exists("gtmUsed", $context) ? $context["gtmUsed"] : (function () { throw new RuntimeError('Variable "gtmUsed" does not exist.', 31, $this->source); })())) || (isset($context["cloudflare"]) || array_key_exists("cloudflare", $context) ? $context["cloudflare"] : (function () { throw new RuntimeError('Variable "cloudflare" does not exist.', 31, $this->source); })())) || ((isset($context["jsFramework"]) || array_key_exists("jsFramework", $context) ? $context["jsFramework"] : (function () { throw new RuntimeError('Variable "jsFramework" does not exist.', 31, $this->source); })()) == "vue"))) {
            // line 32
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_JSTracking_ConsentManagerEmailNote"), "html", null, true);
            echo "

";
        }
        // line 35
        if ((isset($context["showMatomoLinks"]) || array_key_exists("showMatomoLinks", $context) ? $context["showMatomoLinks"] : (function () { throw new RuntimeError('Variable "showMatomoLinks" does not exist.', 35, $this->source); })())) {
            echo "** ";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_JsTrackingTag"), "html", null, true);
        }
        // line 36
        echo "
";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_JSTracking_CodeNoteBeforeClosingHeadEmail", "'head'"), "html", null, true);
        echo "
";
        // line 38
        echo (isset($context["jsTag"]) || array_key_exists("jsTag", $context) ? $context["jsTag"] : (function () { throw new RuntimeError('Variable "jsTag" does not exist.', 38, $this->source); })());
        echo "

";
        // line 40
        if ((isset($context["showMatomoLinks"]) || array_key_exists("showMatomoLinks", $context) ? $context["showMatomoLinks"] : (function () { throw new RuntimeError('Variable "showMatomoLinks" does not exist.', 40, $this->source); })())) {
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_EmailInstructionsDocsPlainText", "https://developer.matomo.org/guides/tracking-javascript-guide");
        }
        // line 41
        echo "
";
        // line 42
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_EmailInstructionsGenerateTrackingCode", ((isset($context["piwikUrl"]) || array_key_exists("piwikUrl", $context) ? $context["piwikUrl"] : (function () { throw new RuntimeError('Variable "piwikUrl" does not exist.', 42, $this->source); })()) . $this->env->getFunction('linkTo')->getCallable()(["module" => "CoreAdminHome", "action" => "trackingCodeGenerator"])));
        echo "

";
        // line 44
        if ((isset($context["showMatomoLinks"]) || array_key_exists("showMatomoLinks", $context) ? $context["showMatomoLinks"] : (function () { throw new RuntimeError('Variable "showMatomoLinks" does not exist.', 44, $this->source); })())) {
            // line 45
            echo "** ";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_InstallationGuides"), "html", null, true);
            echo "
WordPress: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/
Squarespace: https://matomo.org/faq/new-to-piwik/how-do-i-integrate-matomo-with-squarespace-website/
Wix: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-wix/
SharePoint: https://matomo.org/faq/how-to-install/faq_19424/
Joomla: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-joomla/
Shopify: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-shopify-store/
Google Tag Manager: https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager/
Cloudflare: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/
Vue.js: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/
React: https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/

** ";
            // line 57
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_Integrations"), "html", null, true);
            echo "
";
            // line 58
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_JSTrackingIntro3a", "", ""), "html", null, true);
            echo "
https://matomo.org/integrate/

** ";
            // line 61
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_LogAnalytics"), "html", null, true);
            echo "
";
            // line 62
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_LogAnalyticsDescription", "", ""), "html", null, true);
            echo "
https://matomo.org/log-analytics/

** ";
            // line 65
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_MobileAppsAndSDKs"), "html", null, true);
            echo "
";
            // line 66
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_MobileAppsAndSDKsDescription", "", ""), "html", null, true);
            echo "
https://matomo.org/integrate/#programming-language-platforms-and-frameworks

** ";
            // line 69
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_HttpTrackingApi"), "html", null, true);
            echo "
";
            // line 70
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_HttpTrackingApiDescription", "", ""), "html", null, true);
            echo "
https://developer.matomo.org/api-reference/tracking-api

** ";
            // line 73
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataSinglePageApplication"), "html", null, true);
            echo "
";
            // line 74
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_SinglePageApplicationDescription", "", ""), "html", null, true);
            echo "
https://developer.matomo.org/guides/spa-tracking

** Cloudflare
";
            // line 78
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_CloudflareDescription", "", ""), "html", null, true);
            echo "
https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/

** Vue.js
";
            // line 82
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_VueDescription", "", ""), "html", null, true);
            echo "
https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/

** React.js
";
            // line 86
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_ReactDescription", "", ""), "html", null, true);
            echo "
https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/

** ";
            // line 89
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_EmailInstructionsSiteDetailsHeading"), "html", null, true);
            echo "
";
            // line 90
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_EmailInstructionsSiteDetails"), "html", null, true);
            echo "
* ";
            // line 91
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_EmailInstructionsYourSiteId", (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 91, $this->source); })())), "html", null, true);
            echo "
* ";
            // line 92
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_EmailInstructionsYourTrackingUrl", (isset($context["trackingUrl"]) || array_key_exists("trackingUrl", $context) ? $context["trackingUrl"] : (function () { throw new RuntimeError('Variable "trackingUrl" does not exist.', 92, $this->source); })())), "html", null, true);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "@SitesManager/_trackingCodeEmail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 92,  234 => 91,  230 => 90,  226 => 89,  220 => 86,  213 => 82,  206 => 78,  199 => 74,  195 => 73,  189 => 70,  185 => 69,  179 => 66,  175 => 65,  169 => 62,  165 => 61,  159 => 58,  155 => 57,  139 => 45,  137 => 44,  132 => 42,  129 => 41,  125 => 40,  120 => 38,  116 => 37,  113 => 36,  108 => 35,  102 => 32,  100 => 31,  94 => 28,  92 => 27,  89 => 26,  82 => 23,  80 => 22,  77 => 21,  71 => 18,  69 => 17,  63 => 14,  61 => 13,  55 => 10,  53 => 9,  47 => 6,  45 => 5,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if consentManagerName %}
{{ 'CoreAdminHome_JSTracking_ConsentManagerDetected'|translate(consentManagerName, consentManagerUrl) }}

{% endif %}
{% if ga3Used %}
{{ 'SitesManager_GADetectedEmail'|translate('Google Analytics 3', 'GA', 'https://matomo.org/faq/how-to/migrate-from-google-analytics-3-to-matomo/')|raw }}

{% endif %}
{% if ga4Used %}
{{ 'SitesManager_GADetectedEmail'|translate('Google Analytics 4', 'GA', 'https://matomo.org/faq/how-to/migrate-from-google-analytics-4-to-matomo/')|raw }}

{% endif %}
{% if gtmUsed %}
{{ 'SitesManager_GTMDetectedEmail'|translate('https://matomo.org/faq/tag-manager/migrating-from-google-tag-manager/')|raw }}

{% endif %}
{% if cloudflare %}
{{ 'SitesManager_CloudflareDetectedEmail'|translate('https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/')|raw }}

{% endif %}

{% if jsFramework == 'vue' %}
    {{ 'SitesManager_VueDetectedEmail'|translate('vue-matomo', 'https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/')|raw }}

{% endif %}

{% if jsFramework == 'react' %}
{{ 'SitesManager_ReactDetectedEmail'|translate('https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/')|raw }}

{% endif %}
{% if consentManagerName or ga3Used or ga4Used or gtmUsed or cloudflare or jsFramework == 'vue' %}
{{ 'CoreAdminHome_JSTracking_ConsentManagerEmailNote'|translate }}

{% endif %}
{% if showMatomoLinks %}** {{ 'General_JsTrackingTag'|translate }}{% endif %}

{{ 'CoreAdminHome_JSTracking_CodeNoteBeforeClosingHeadEmail'|translate(\"'head'\") }}
{{ jsTag|raw }}

{% if showMatomoLinks %}{{ 'SitesManager_EmailInstructionsDocsPlainText'|translate('https://developer.matomo.org/guides/tracking-javascript-guide')|raw }}{% endif %}

{{ 'SitesManager_EmailInstructionsGenerateTrackingCode'|translate(piwikUrl ~ linkTo({'module': 'CoreAdminHome', 'action': 'trackingCodeGenerator'}))|raw }}

{% if showMatomoLinks %}
** {{ 'SitesManager_InstallationGuides'|translate }}
WordPress: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/
Squarespace: https://matomo.org/faq/new-to-piwik/how-do-i-integrate-matomo-with-squarespace-website/
Wix: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-wix/
SharePoint: https://matomo.org/faq/how-to-install/faq_19424/
Joomla: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-joomla/
Shopify: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-shopify-store/
Google Tag Manager: https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager/
Cloudflare: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/
Vue.js: https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/
React: https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/

** {{ 'SitesManager_Integrations'|translate }}
{{ 'CoreAdminHome_JSTrackingIntro3a'|translate('', '') }}
https://matomo.org/integrate/

** {{ 'SitesManager_LogAnalytics'|translate }}
{{ 'SitesManager_LogAnalyticsDescription'|translate('', '') }}
https://matomo.org/log-analytics/

** {{ 'SitesManager_MobileAppsAndSDKs'|translate }}
{{ 'SitesManager_MobileAppsAndSDKsDescription'|translate('', '') }}
https://matomo.org/integrate/#programming-language-platforms-and-frameworks

** {{ 'CoreAdminHome_HttpTrackingApi'|translate }}
{{ 'CoreAdminHome_HttpTrackingApiDescription'|translate('', '') }}
https://developer.matomo.org/api-reference/tracking-api

** {{ 'SitesManager_SiteWithoutDataSinglePageApplication'|translate }}
{{ 'CoreAdminHome_SinglePageApplicationDescription'|translate('', '') }}
https://developer.matomo.org/guides/spa-tracking

** Cloudflare
{{ 'CoreAdminHome_CloudflareDescription'|translate('', '') }}
https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/

** Vue.js
{{ 'CoreAdminHome_VueDescription'|translate('', '') }}
https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/

** React.js
{{ 'CoreAdminHome_ReactDescription'|translate('', '') }}
https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/

** {{ 'SitesManager_EmailInstructionsSiteDetailsHeading'|translate }}
{{ 'SitesManager_EmailInstructionsSiteDetails'|translate }}
* {{ 'SitesManager_EmailInstructionsYourSiteId'|translate(idSite) }}
* {{ 'SitesManager_EmailInstructionsYourTrackingUrl'|translate(trackingUrl) }}
{% endif %}
", "@SitesManager/_trackingCodeEmail.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/SitesManager/templates/_trackingCodeEmail.twig");
    }
}
