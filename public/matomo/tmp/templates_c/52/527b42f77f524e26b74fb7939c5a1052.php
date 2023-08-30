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

/* @ScheduledReports/reportParametersScheduledReports.twig */
class __TwigTemplate_e33205b0ecb9aab710b3bb5913997fdf extends Template
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
        echo "<div
  vue-entry=\"ScheduledReports.ReportParameters\"
  report-type=\"";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("reportType", $context)) ? (_twig_default_filter((isset($context["reportType"]) || array_key_exists("reportType", $context) ? $context["reportType"] : (function () { throw new RuntimeError('Variable "reportType" does not exist.', 3, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  default-display-format=\"";
        // line 4
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("defaultDisplayFormat", $context)) ? (_twig_default_filter((isset($context["defaultDisplayFormat"]) || array_key_exists("defaultDisplayFormat", $context) ? $context["defaultDisplayFormat"] : (function () { throw new RuntimeError('Variable "defaultDisplayFormat" does not exist.', 4, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
  default-email-me=\"";
        // line 5
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("defaultEmailMe", $context)) ? (_twig_default_filter((isset($context["defaultEmailMe"]) || array_key_exists("defaultEmailMe", $context) ? $context["defaultEmailMe"] : (function () { throw new RuntimeError('Variable "defaultEmailMe" does not exist.', 5, $this->source); })()), false)) : (false))), "html_attr");
        echo "\"
  default-evolution-graph=\"";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("defaultEvolutionGraph", $context)) ? (_twig_default_filter((isset($context["defaultEvolutionGraph"]) || array_key_exists("defaultEvolutionGraph", $context) ? $context["defaultEvolutionGraph"] : (function () { throw new RuntimeError('Variable "defaultEvolutionGraph" does not exist.', 6, $this->source); })()), false)) : (false))), "html_attr");
        echo "\"
  current-user-email=\"";
        // line 7
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("currentUserEmail", $context)) ? (_twig_default_filter((isset($context["currentUserEmail"]) || array_key_exists("currentUserEmail", $context) ? $context["currentUserEmail"] : (function () { throw new RuntimeError('Variable "currentUserEmail" does not exist.', 7, $this->source); })()), null)) : (null))), "html_attr");
        echo "\"
></div>";
    }

    public function getTemplateName()
    {
        return "@ScheduledReports/reportParametersScheduledReports.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 7,  53 => 6,  49 => 5,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div
  vue-entry=\"ScheduledReports.ReportParameters\"
  report-type=\"{{ reportType|default(null)|json_encode|e('html_attr') }}\"
  default-display-format=\"{{ defaultDisplayFormat|default(null)|json_encode|e('html_attr') }}\"
  default-email-me=\"{{ defaultEmailMe|default(false)|json_encode|e('html_attr') }}\"
  default-evolution-graph=\"{{ defaultEvolutionGraph|default(false)|json_encode|e('html_attr') }}\"
  current-user-email=\"{{ currentUserEmail|default(null)|json_encode|e('html_attr') }}\"
></div>", "@ScheduledReports/reportParametersScheduledReports.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/ScheduledReports/templates/reportParametersScheduledReports.twig");
    }
}
