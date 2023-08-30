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

/* @ScheduledReports/index.twig */
class __TwigTemplate_af77ac88671d01a0aa92c8362b386437 extends Template
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
        return "admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("ScheduledReports_PersonalEmailReports"), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@ScheduledReports/index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_topcontrols($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    ";
        $this->loadTemplate("@CoreHome/_siteSelectHeader.twig", "@ScheduledReports/index.twig", 6)->display($context);
        // line 7
        echo "    ";
        $this->loadTemplate("@CoreHome/_periodSelect.twig", "@ScheduledReports/index.twig", 7)->display($context);
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "
";
        // line 12
        ob_start();
        echo $this->env->getFunction('postEvent')->getCallable()("Template.reportParametersScheduledReports");
        $context["reportParametersScheduledReportsEvent"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 13
        echo "
";
        // line 16
        echo "<div style=\"display:none\" vue-entry-ignore ng-non-bindable>
    ";
        // line 17
        echo (isset($context["reportParametersScheduledReportsEvent"]) || array_key_exists("reportParametersScheduledReportsEvent", $context) ? $context["reportParametersScheduledReportsEvent"] : (function () { throw new RuntimeError('Variable "reportParametersScheduledReportsEvent" does not exist.', 17, $this->source); })());
        echo "
</div>

<div
  vue-entry=\"ScheduledReports.ManageScheduledReport\"
  content-title=\"";
        // line 22
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("title", $context)) ? (_twig_default_filter((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 22, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  user-login=\"";
        // line 23
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("userLogin", $context)) ? (_twig_default_filter((isset($context["userLogin"]) || array_key_exists("userLogin", $context) ? $context["userLogin"] : (function () { throw new RuntimeError('Variable "userLogin" does not exist.', 23, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  login-module=\"";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("loginModule", $context)) ? (_twig_default_filter((isset($context["loginModule"]) || array_key_exists("loginModule", $context) ? $context["loginModule"] : (function () { throw new RuntimeError('Variable "loginModule" does not exist.', 24, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  reports=\"";
        // line 25
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("reports", $context)) ? (_twig_default_filter((isset($context["reports"]) || array_key_exists("reports", $context) ? $context["reports"] : (function () { throw new RuntimeError('Variable "reports" does not exist.', 25, $this->source); })()), [])) : ([]))), "html_attr");
        echo "\"
  site-name=\"";
        // line 26
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("siteName", $context)) ? (_twig_default_filter((isset($context["siteName"]) || array_key_exists("siteName", $context) ? $context["siteName"] : (function () { throw new RuntimeError('Variable "siteName" does not exist.', 26, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  segment-editor-activated=\"";
        // line 27
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("segmentEditorActivated", $context)) ? (_twig_default_filter((isset($context["segmentEditorActivated"]) || array_key_exists("segmentEditorActivated", $context) ? $context["segmentEditorActivated"] : (function () { throw new RuntimeError('Variable "segmentEditorActivated" does not exist.', 27, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  saved-segments-by-id=\"";
        // line 28
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("savedSegmentsById", $context)) ? (_twig_default_filter((isset($context["savedSegmentsById"]) || array_key_exists("savedSegmentsById", $context) ? $context["savedSegmentsById"] : (function () { throw new RuntimeError('Variable "savedSegmentsById" does not exist.', 28, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  periods=\"";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("periods", $context)) ? (_twig_default_filter((isset($context["periods"]) || array_key_exists("periods", $context) ? $context["periods"] : (function () { throw new RuntimeError('Variable "periods" does not exist.', 29, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  download-output-type=\"";
        // line 30
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("downloadOutputType", $context)) ? (_twig_default_filter((isset($context["downloadOutputType"]) || array_key_exists("downloadOutputType", $context) ? $context["downloadOutputType"] : (function () { throw new RuntimeError('Variable "downloadOutputType" does not exist.', 30, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  language=\"";
        // line 31
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("language", $context)) ? (_twig_default_filter((isset($context["language"]) || array_key_exists("language", $context) ? $context["language"] : (function () { throw new RuntimeError('Variable "language" does not exist.', 31, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  report-formats-by-report-type=\"";
        // line 32
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("reportFormatsByReportType", $context)) ? (_twig_default_filter((isset($context["reportFormatsByReportType"]) || array_key_exists("reportFormatsByReportType", $context) ? $context["reportFormatsByReportType"] : (function () { throw new RuntimeError('Variable "reportFormatsByReportType" does not exist.', 32, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  param-periods=\"";
        // line 33
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("paramPeriods", $context)) ? (_twig_default_filter((isset($context["paramPeriods"]) || array_key_exists("paramPeriods", $context) ? $context["paramPeriods"] : (function () { throw new RuntimeError('Variable "paramPeriods" does not exist.', 33, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  report-type-options=\"";
        // line 34
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("reportTypeOptions", $context)) ? (_twig_default_filter((isset($context["reportTypeOptions"]) || array_key_exists("reportTypeOptions", $context) ? $context["reportTypeOptions"] : (function () { throw new RuntimeError('Variable "reportTypeOptions" does not exist.', 34, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  report-formats-by-report-type-options=\"";
        // line 35
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("reportFormatsByReportTypeOptions", $context)) ? (_twig_default_filter((isset($context["reportFormatsByReportTypeOptions"]) || array_key_exists("reportFormatsByReportTypeOptions", $context) ? $context["reportFormatsByReportTypeOptions"] : (function () { throw new RuntimeError('Variable "reportFormatsByReportTypeOptions" does not exist.', 35, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  display-formats=\"";
        // line 36
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("displayFormats", $context)) ? (_twig_default_filter((isset($context["displayFormats"]) || array_key_exists("displayFormats", $context) ? $context["displayFormats"] : (function () { throw new RuntimeError('Variable "displayFormats" does not exist.', 36, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  reports-by-category-by-report-type=\"";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("reportsByCategoryByReportType", $context)) ? (_twig_default_filter((isset($context["reportsByCategoryByReportType"]) || array_key_exists("reportsByCategoryByReportType", $context) ? $context["reportsByCategoryByReportType"] : (function () { throw new RuntimeError('Variable "reportsByCategoryByReportType" does not exist.', 37, $this->source); })()), [])) : ([]))), "html_attr");
        echo "\"
  allow-multiple-reports-by-report-type=\"";
        // line 38
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("allowMultipleReportsByReportType", $context)) ? (_twig_default_filter((isset($context["allowMultipleReportsByReportType"]) || array_key_exists("allowMultipleReportsByReportType", $context) ? $context["allowMultipleReportsByReportType"] : (function () { throw new RuntimeError('Variable "allowMultipleReportsByReportType" does not exist.', 38, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  count-websites=\"";
        // line 39
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("countWebsites", $context)) ? (_twig_default_filter((isset($context["countWebsites"]) || array_key_exists("countWebsites", $context) ? $context["countWebsites"] : (function () { throw new RuntimeError('Variable "countWebsites" does not exist.', 39, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  report-types=\"";
        // line 40
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("reportTypes", $context)) ? (_twig_default_filter((isset($context["reportTypes"]) || array_key_exists("reportTypes", $context) ? $context["reportTypes"] : (function () { throw new RuntimeError('Variable "reportTypes" does not exist.', 40, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
>
    <template v-slot:report-parameters >
        ";
        // line 43
        echo (isset($context["reportParametersScheduledReportsEvent"]) || array_key_exists("reportParametersScheduledReportsEvent", $context) ? $context["reportParametersScheduledReportsEvent"] : (function () { throw new RuntimeError('Variable "reportParametersScheduledReportsEvent" does not exist.', 43, $this->source); })());
        echo "
    </template>
</div>

<div class=\"ui-confirm\" id=\"confirm\">
    <h2>";
        // line 48
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("ScheduledReports_AreYouSureDeleteReport"), "html", null, true);
        echo "</h2>
    <input role=\"yes\" type=\"button\" value=\"";
        // line 49
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Yes"), "html", null, true);
        echo "\"/>
    <input role=\"no\" type=\"button\" value=\"";
        // line 50
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_No"), "html", null, true);
        echo "\"/>
</div>

<script type=\"text/javascript\">
    var ReportPlugin = {};
    ReportPlugin.defaultPeriod = '";
        // line 55
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["defaultPeriod"]) || array_key_exists("defaultPeriod", $context) ? $context["defaultPeriod"] : (function () { throw new RuntimeError('Variable "defaultPeriod" does not exist.', 55, $this->source); })()), "html", null, true);
        echo "';
    ReportPlugin.defaultHour = '";
        // line 56
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["defaultHour"]) || array_key_exists("defaultHour", $context) ? $context["defaultHour"] : (function () { throw new RuntimeError('Variable "defaultHour" does not exist.', 56, $this->source); })()), "html", null, true);
        echo "';
    ReportPlugin.defaultReportType = '";
        // line 57
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["defaultReportType"]) || array_key_exists("defaultReportType", $context) ? $context["defaultReportType"] : (function () { throw new RuntimeError('Variable "defaultReportType" does not exist.', 57, $this->source); })()), "html", null, true);
        echo "';
    ReportPlugin.defaultReportFormat = '";
        // line 58
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["defaultReportFormat"]) || array_key_exists("defaultReportFormat", $context) ? $context["defaultReportFormat"] : (function () { throw new RuntimeError('Variable "defaultReportFormat" does not exist.', 58, $this->source); })()), "html", null, true);
        echo "';
    ReportPlugin.reportList = ";
        // line 59
        echo (isset($context["reportsJSON"]) || array_key_exists("reportsJSON", $context) ? $context["reportsJSON"] : (function () { throw new RuntimeError('Variable "reportsJSON" does not exist.', 59, $this->source); })());
        echo ";
    ReportPlugin.createReportString = \"";
        // line 60
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("ScheduledReports_CreateReport"), "html", null, true);
        echo "\";
    ReportPlugin.updateReportString = \"";
        // line 61
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("ScheduledReports_UpdateReport"), "html", null, true);
        echo "\";
    ReportPlugin.defaultEvolutionPeriodN = ";
        // line 62
        echo json_encode((isset($context["defaultEvolutionPeriodN"]) || array_key_exists("defaultEvolutionPeriodN", $context) ? $context["defaultEvolutionPeriodN"] : (function () { throw new RuntimeError('Variable "defaultEvolutionPeriodN" does not exist.', 62, $this->source); })()));
        echo ";
    ReportPlugin.periodTranslations = ";
        // line 63
        echo json_encode((isset($context["periodTranslations"]) || array_key_exists("periodTranslations", $context) ? $context["periodTranslations"] : (function () { throw new RuntimeError('Variable "periodTranslations" does not exist.', 63, $this->source); })()));
        echo ";
</script>
<style type=\"text/css\">
    .reportCategory {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .entityAddContainer {
        position:relative;
    }

    .emailReports .top_controls {
        padding-bottom: 18px;
    }

</style>
";
    }

    public function getTemplateName()
    {
        return "@ScheduledReports/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 63,  219 => 62,  215 => 61,  211 => 60,  207 => 59,  203 => 58,  199 => 57,  195 => 56,  191 => 55,  183 => 50,  179 => 49,  175 => 48,  167 => 43,  161 => 40,  157 => 39,  153 => 38,  149 => 37,  145 => 36,  141 => 35,  137 => 34,  133 => 33,  129 => 32,  125 => 31,  121 => 30,  117 => 29,  113 => 28,  109 => 27,  105 => 26,  101 => 25,  97 => 24,  93 => 23,  89 => 22,  81 => 17,  78 => 16,  75 => 13,  71 => 12,  68 => 11,  64 => 10,  59 => 7,  56 => 6,  52 => 5,  47 => 1,  43 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'admin.twig' %}

{% set title %}{{ 'ScheduledReports_PersonalEmailReports'|translate }}{% endset %}

{% block topcontrols %}
    {% include \"@CoreHome/_siteSelectHeader.twig\" %}
    {% include \"@CoreHome/_periodSelect.twig\" %}
{% endblock %}

{% block content %}

{% set reportParametersScheduledReportsEvent %}{{ postEvent('Template.reportParametersScheduledReports') }}{% endset %}

{# load the Template.reportParametersScheduledReports event twice, once here outside of vue so any inline scripts
   will execute. then again in the vue slot so it will be used correctly. This is hack to provide some level of BC. #}
<div style=\"display:none\" vue-entry-ignore ng-non-bindable>
    {{ reportParametersScheduledReportsEvent|raw }}
</div>

<div
  vue-entry=\"ScheduledReports.ManageScheduledReport\"
  content-title=\"{{ title|default(null)|json_encode|e('html_attr') }}\"
  user-login=\"{{ userLogin|default(null)|json_encode|e('html_attr') }}\"
  login-module=\"{{ loginModule|default(null)|json_encode|e('html_attr') }}\"
  reports=\"{{ reports|default([])|json_encode|e('html_attr') }}\"
  site-name=\"{{ siteName|default(null)|json_encode|e('html_attr') }}\"
  segment-editor-activated=\"{{ segmentEditorActivated|default(null)|json_encode|e('html_attr') }}\"
  saved-segments-by-id=\"{{ savedSegmentsById|default(null)|json_encode|e('html_attr') }}\"
  periods=\"{{ periods|default(null)|json_encode|e('html_attr') }}\"
  download-output-type=\"{{ downloadOutputType|default(null)|json_encode|e('html_attr') }}\"
  language=\"{{ language|default(null)|json_encode|e('html_attr') }}\"
  report-formats-by-report-type=\"{{ reportFormatsByReportType|default(null)|json_encode|e('html_attr') }}\"
  param-periods=\"{{ paramPeriods|default(null)|json_encode|e('html_attr') }}\"
  report-type-options=\"{{ reportTypeOptions|default(null)|json_encode|e('html_attr') }}\"
  report-formats-by-report-type-options=\"{{ reportFormatsByReportTypeOptions|default(null)|json_encode|e('html_attr') }}\"
  display-formats=\"{{ displayFormats|default(null)|json_encode|e('html_attr') }}\"
  reports-by-category-by-report-type=\"{{ reportsByCategoryByReportType|default({})|json_encode|e('html_attr') }}\"
  allow-multiple-reports-by-report-type=\"{{ allowMultipleReportsByReportType|default(null)|json_encode|e('html_attr') }}\"
  count-websites=\"{{ countWebsites|default(null)|json_encode|e('html_attr') }}\"
  report-types=\"{{ reportTypes|default(null)|json_encode|e('html_attr') }}\"
>
    <template v-slot:report-parameters >
        {{ reportParametersScheduledReportsEvent|raw }}
    </template>
</div>

<div class=\"ui-confirm\" id=\"confirm\">
    <h2>{{ 'ScheduledReports_AreYouSureDeleteReport'|translate }}</h2>
    <input role=\"yes\" type=\"button\" value=\"{{ 'General_Yes'|translate }}\"/>
    <input role=\"no\" type=\"button\" value=\"{{ 'General_No'|translate }}\"/>
</div>

<script type=\"text/javascript\">
    var ReportPlugin = {};
    ReportPlugin.defaultPeriod = '{{ defaultPeriod }}';
    ReportPlugin.defaultHour = '{{ defaultHour }}';
    ReportPlugin.defaultReportType = '{{ defaultReportType }}';
    ReportPlugin.defaultReportFormat = '{{ defaultReportFormat }}';
    ReportPlugin.reportList = {{ reportsJSON | raw }};
    ReportPlugin.createReportString = \"{{ 'ScheduledReports_CreateReport'|translate }}\";
    ReportPlugin.updateReportString = \"{{ 'ScheduledReports_UpdateReport'|translate }}\";
    ReportPlugin.defaultEvolutionPeriodN = {{ defaultEvolutionPeriodN|json_encode|raw }};
    ReportPlugin.periodTranslations = {{ periodTranslations|json_encode|raw }};
</script>
<style type=\"text/css\">
    .reportCategory {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .entityAddContainer {
        position:relative;
    }

    .emailReports .top_controls {
        padding-bottom: 18px;
    }

</style>
{% endblock %}
", "@ScheduledReports/index.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/ScheduledReports/templates/index.twig");
    }
}
