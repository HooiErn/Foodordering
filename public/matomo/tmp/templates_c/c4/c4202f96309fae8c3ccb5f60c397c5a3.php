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

/* @MobileMessaging/reportParametersScheduledReports.twig */
class __TwigTemplate_7bddb215d3235fd550b4afd72fdcd995 extends Template
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
  vue-entry=\"MobileMessaging.ReportParameters\"
  phone-numbers=\"";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, json_encode(((array_key_exists("phoneNumbers", $context)) ? (_twig_default_filter((isset($context["phoneNumbers"]) || array_key_exists("phoneNumbers", $context) ? $context["phoneNumbers"] : (function () { throw new RuntimeError('Variable "phoneNumbers" does not exist.', 3, $this->source); })()), [])) : ([]))), "html_attr");
        echo "\"
></div>
";
    }

    public function getTemplateName()
    {
        return "@MobileMessaging/reportParametersScheduledReports.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div
  vue-entry=\"MobileMessaging.ReportParameters\"
  phone-numbers=\"{{ phoneNumbers|default([])|json_encode|e('html_attr') }}\"
></div>
", "@MobileMessaging/reportParametersScheduledReports.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/MobileMessaging/templates/reportParametersScheduledReports.twig");
    }
}
