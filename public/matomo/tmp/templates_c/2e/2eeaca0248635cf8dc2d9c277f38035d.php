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

/* @CoreAdminHome/trackingCodeGenerator.twig */
class __TwigTemplate_f3d9bd16980678173dd084ea515415ae extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_TrackingCode"), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@CoreAdminHome/trackingCodeGenerator.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"plugins/CoreAdminHome/stylesheets/jsTrackingGenerator.css\" />
";
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "
    <div class=\"card\">
        <div class=\"card-content\">
            <h2 piwik-enriched-headline
                help-url=\"https://matomo.org/docs/tracking-api/\"
                rate=\"";
        // line 16
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_TrackingCode"), "html_attr");
        echo "\">";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_TrackingCode"), "html", null, true);
        echo "</h2>
            <p style=\"padding-left: 0;\">";
        // line 17
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_TrackingCodeIntro"), "html", null, true);
        echo "</p>
        </div>
        <div class=\"card-action\">
            ";
        // line 20
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_GoTo2"), "html", null, true);
        echo ":
            <a href=\"#/javaScriptTracking\">";
        // line 21
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_JavaScriptTracking"), "html", null, true);
        echo "</a>
            <a href=\"#/imageTracking\">";
        // line 22
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_ImageTracking"), "html", null, true);
        echo "</a>
            <a href=\"#/importServerLogs\">";
        // line 23
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_ImportingServerLogs"), "html", null, true);
        echo "</a>
            <a href=\"#/mobileAppsAndSdks\">";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_MobileAppsAndSDKs"), "html", null, true);
        echo "</a>
            <a href=\"#/trackingApi\">";
        // line 25
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_HttpTrackingApi"), "html", null, true);
        echo "</a>
            <a href=\"#/singlePageApplication\">";
        // line 26
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataSinglePageApplication"), "html", null, true);
        echo "</a>
            <a href=\"#/google-tag-manager\">";
        // line 27
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGoogleTagManager"), "html", null, true);
        echo "</a>
            <a href=\"#/wordpress\">Wordpress</a>
            <a href=\"#/cloudflare\">Cloudflare</a>
            <a href=\"#/vue\">Vue.js</a>
            <a href=\"#/react\">React.js</a>
            ";
        // line 32
        echo $this->env->getFunction('postEvent')->getCallable()("Template.endTrackingCodePageTableOfContents");
        echo "
        </div>
    </div>

    <input type=\"hidden\" name=\"numMaxCustomVariables\"
           value=\"";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["maxCustomVariables"]) || array_key_exists("maxCustomVariables", $context) ? $context["maxCustomVariables"] : (function () { throw new RuntimeError('Variable "maxCustomVariables" does not exist.', 37, $this->source); })()), "html_attr");
        echo "\">

<div
    matomo-js-tracking-code-generator
    default-site=\"";
        // line 41
        echo \Piwik\piwik_escape_filter($this->env, json_encode((isset($context["defaultSiteDecoded"]) || array_key_exists("defaultSiteDecoded", $context) ? $context["defaultSiteDecoded"] : (function () { throw new RuntimeError('Variable "defaultSiteDecoded" does not exist.', 41, $this->source); })())), "html_attr");
        echo "\"
    max-custom-variables=\"";
        // line 42
        echo \Piwik\piwik_escape_filter($this->env, json_encode((isset($context["maxCustomVariables"]) || array_key_exists("maxCustomVariables", $context) ? $context["maxCustomVariables"] : (function () { throw new RuntimeError('Variable "maxCustomVariables" does not exist.', 42, $this->source); })())), "html_attr");
        echo "\"
    server-side-do-not-track-enabled=\"";
        // line 43
        echo \Piwik\piwik_escape_filter($this->env, json_encode((isset($context["serverSideDoNotTrackEnabled"]) || array_key_exists("serverSideDoNotTrackEnabled", $context) ? $context["serverSideDoNotTrackEnabled"] : (function () { throw new RuntimeError('Variable "serverSideDoNotTrackEnabled" does not exist.', 43, $this->source); })())), "html_attr");
        echo "\"
></div>

<div
    matomo-image-tracking-code-generator
    default-site=\"";
        // line 48
        echo \Piwik\piwik_escape_filter($this->env, json_encode((isset($context["defaultSiteDecoded"]) || array_key_exists("defaultSiteDecoded", $context) ? $context["defaultSiteDecoded"] : (function () { throw new RuntimeError('Variable "defaultSiteDecoded" does not exist.', 48, $this->source); })())), "html_attr");
        echo "\"
></div>

<div piwik-content-block content-title=\"";
        // line 51
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_ImportingServerLogs"), "html_attr");
        echo "\"
     anchor=\"importServerLogs\">
    <p>
        ";
        // line 54
        echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_ImportingServerLogsDesc", "<a href=\"https://matomo.org/log-analytics/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "
    </p>
</div>

<div piwik-content-block content-title=\"";
        // line 58
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_MobileAppsAndSDKs"), "html", null, true);
        echo "\" anchor=\"mobileAppsAndSdks\">
    <p>";
        // line 59
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_MobileAppsAndSDKsDescription", "<a href=\"https://matomo.org/integrate/#programming-language-platforms-and-frameworks\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "</p>
</div>

<div piwik-content-block content-title=\"";
        // line 62
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_HttpTrackingApi"), "html", null, true);
        echo "\" anchor=\"trackingApi\">
    <p>";
        // line 63
        echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_HttpTrackingApiDescription", "<a href=\"https://developer.matomo.org/api-reference/tracking-api\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "</p>
</div>

<div piwik-content-block content-title=\"";
        // line 66
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataSinglePageApplication"), "html", null, true);
        echo "\" anchor=\"singlePageApplication\">
     <p>";
        // line 67
        echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_SinglePageApplicationDescription", "<a href=\"https://developer.matomo.org/guides/spa-tracking\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "</p>
</div>

<div piwik-content-block content-title=\"";
        // line 70
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGoogleTagManager"), "html", null, true);
        echo "\" anchor=\"google-tag-manager\">
    <p>";
        // line 71
        echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_GoogleTagManagerDescription", "<a href=\"https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "</p>
</div>

<div piwik-content-block content-title=\"Wordpress\" anchor=\"wordpress\">
    <p>";
        // line 75
        echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_WordpressDescription", "<a href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/\" target=\"_blank\">", "</a>");
        echo "</p>
</div>

<div piwik-content-block content-title=\"Cloudflare\" anchor=\"cloudflare\">
    <p>";
        // line 79
        echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_CloudflareDescription", "<a href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "</p>
</div>

<div piwik-content-block content-title=\"Vue.js\" anchor=\"vue\">
    <p>";
        // line 83
        echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_VueDescription", "<a href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "</p>
</div>

<div piwik-content-block content-title=\"React.js\" anchor=\"react\">
    <p>";
        // line 87
        echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_ReactDescription", "<a href=\"https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "</p>
</div>


";
        // line 91
        echo $this->env->getFunction('postEvent')->getCallable()("Template.endTrackingCodePage");
        echo "

";
    }

    public function getTemplateName()
    {
        return "@CoreAdminHome/trackingCodeGenerator.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 91,  235 => 87,  228 => 83,  221 => 79,  214 => 75,  207 => 71,  203 => 70,  197 => 67,  193 => 66,  187 => 63,  183 => 62,  177 => 59,  173 => 58,  166 => 54,  160 => 51,  154 => 48,  146 => 43,  142 => 42,  138 => 41,  131 => 37,  123 => 32,  115 => 27,  111 => 26,  107 => 25,  103 => 24,  99 => 23,  95 => 22,  91 => 21,  87 => 20,  81 => 17,  75 => 16,  68 => 11,  64 => 10,  56 => 4,  52 => 3,  47 => 1,  43 => 8,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'admin.twig' %}

{% block head %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"plugins/CoreAdminHome/stylesheets/jsTrackingGenerator.css\" />
{% endblock %}

{% set title %}{{ 'CoreAdminHome_TrackingCode'|translate }}{% endset %}

{% block content %}

    <div class=\"card\">
        <div class=\"card-content\">
            <h2 piwik-enriched-headline
                help-url=\"https://matomo.org/docs/tracking-api/\"
                rate=\"{{ 'CoreAdminHome_TrackingCode'|translate|e('html_attr') }}\">{{ 'CoreAdminHome_TrackingCode'|translate  }}</h2>
            <p style=\"padding-left: 0;\">{{ 'CoreAdminHome_TrackingCodeIntro'|translate }}</p>
        </div>
        <div class=\"card-action\">
            {{ 'General_GoTo2'|translate }}:
            <a href=\"#/javaScriptTracking\">{{ 'CoreAdminHome_JavaScriptTracking'|translate  }}</a>
            <a href=\"#/imageTracking\">{{ 'CoreAdminHome_ImageTracking'|translate }}</a>
            <a href=\"#/importServerLogs\">{{ 'CoreAdminHome_ImportingServerLogs'|translate }}</a>
            <a href=\"#/mobileAppsAndSdks\">{{ 'SitesManager_MobileAppsAndSDKs'|translate }}</a>
            <a href=\"#/trackingApi\">{{ 'CoreAdminHome_HttpTrackingApi'|translate }}</a>
            <a href=\"#/singlePageApplication\">{{ 'SitesManager_SiteWithoutDataSinglePageApplication'|translate }}</a>
            <a href=\"#/google-tag-manager\">{{ 'SitesManager_SiteWithoutDataGoogleTagManager'|translate }}</a>
            <a href=\"#/wordpress\">Wordpress</a>
            <a href=\"#/cloudflare\">Cloudflare</a>
            <a href=\"#/vue\">Vue.js</a>
            <a href=\"#/react\">React.js</a>
            {{ postEvent('Template.endTrackingCodePageTableOfContents') }}
        </div>
    </div>

    <input type=\"hidden\" name=\"numMaxCustomVariables\"
           value=\"{{ maxCustomVariables|e('html_attr') }}\">

<div
    matomo-js-tracking-code-generator
    default-site=\"{{ defaultSiteDecoded|json_encode|e('html_attr') }}\"
    max-custom-variables=\"{{ maxCustomVariables|json_encode|e('html_attr') }}\"
    server-side-do-not-track-enabled=\"{{ serverSideDoNotTrackEnabled|json_encode|e('html_attr') }}\"
></div>

<div
    matomo-image-tracking-code-generator
    default-site=\"{{ defaultSiteDecoded|json_encode|e('html_attr') }}\"
></div>

<div piwik-content-block content-title=\"{{ 'CoreAdminHome_ImportingServerLogs'|translate|e('html_attr') }}\"
     anchor=\"importServerLogs\">
    <p>
        {{ 'CoreAdminHome_ImportingServerLogsDesc'|translate('<a href=\"https://matomo.org/log-analytics/\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}
    </p>
</div>

<div piwik-content-block content-title=\"{{ 'SitesManager_MobileAppsAndSDKs'|translate }}\" anchor=\"mobileAppsAndSdks\">
    <p>{{ 'SitesManager_MobileAppsAndSDKsDescription'|translate('<a href=\"https://matomo.org/integrate/#programming-language-platforms-and-frameworks\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>
</div>

<div piwik-content-block content-title=\"{{ 'CoreAdminHome_HttpTrackingApi'|translate }}\" anchor=\"trackingApi\">
    <p>{{ 'CoreAdminHome_HttpTrackingApiDescription'|translate('<a href=\"https://developer.matomo.org/api-reference/tracking-api\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>
</div>

<div piwik-content-block content-title=\"{{ 'SitesManager_SiteWithoutDataSinglePageApplication'|translate }}\" anchor=\"singlePageApplication\">
     <p>{{ 'CoreAdminHome_SinglePageApplicationDescription'|translate('<a href=\"https://developer.matomo.org/guides/spa-tracking\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>
</div>

<div piwik-content-block content-title=\"{{ 'SitesManager_SiteWithoutDataGoogleTagManager'|translate }}\" anchor=\"google-tag-manager\">
    <p>{{ 'CoreAdminHome_GoogleTagManagerDescription'|translate('<a href=\"https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager/\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>
</div>

<div piwik-content-block content-title=\"Wordpress\" anchor=\"wordpress\">
    <p>{{ 'CoreAdminHome_WordpressDescription'|translate('<a href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/\" target=\"_blank\">','</a>')|raw }}</p>
</div>

<div piwik-content-block content-title=\"Cloudflare\" anchor=\"cloudflare\">
    <p>{{ 'CoreAdminHome_CloudflareDescription'|translate('<a href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>
</div>

<div piwik-content-block content-title=\"Vue.js\" anchor=\"vue\">
    <p>{{ 'CoreAdminHome_VueDescription'|translate('<a href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>
</div>

<div piwik-content-block content-title=\"React.js\" anchor=\"react\">
    <p>{{ 'CoreAdminHome_ReactDescription'|translate('<a href=\"https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>
</div>


{{ postEvent('Template.endTrackingCodePage') }}

{% endblock %}
", "@CoreAdminHome/trackingCodeGenerator.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/CoreAdminHome/templates/trackingCodeGenerator.twig");
    }
}
