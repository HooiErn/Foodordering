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

/* @MultiSites/getSitesInfo.twig */
class __TwigTemplate_bb66d3c1f82912a56f39e427c404098b extends Template
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
        return $this->loadTemplate((((isset($context["isWidgetized"]) || array_key_exists("isWidgetized", $context) ? $context["isWidgetized"] : (function () { throw new RuntimeError('Variable "isWidgetized" does not exist.', 1, $this->source); })())) ? ("empty.twig") : ("dashboard.twig")), "@MultiSites/getSitesInfo.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_topcontrols($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    ";
        if ( !(isset($context["isWidgetized"]) || array_key_exists("isWidgetized", $context) ? $context["isWidgetized"] : (function () { throw new RuntimeError('Variable "isWidgetized" does not exist.', 4, $this->source); })())) {
            // line 5
            echo "        ";
            $this->loadTemplate("@CoreHome/_periodSelect.twig", "@MultiSites/getSitesInfo.twig", 5)->display($context);
            // line 6
            echo "        ";
            $this->loadTemplate("@CoreHome/_headerMessage.twig", "@MultiSites/getSitesInfo.twig", 6)->display($context);
            // line 7
            echo "    ";
        }
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "<div class=\"row\" id=\"multisites\">
    <div class=\"col s12 m12 l10 offset-l1\">
        ";
        // line 13
        if ((isset($context["isWidgetized"]) || array_key_exists("isWidgetized", $context) ? $context["isWidgetized"] : (function () { throw new RuntimeError('Variable "isWidgetized" does not exist.', 13, $this->source); })())) {
            // line 14
            echo "            <div id=\"main\">
        ";
        } else {
            // line 16
            echo "            <div id=\"main\" class=\"card\">
                <div class=\"card-content\">
        ";
        }
        // line 19
        echo "                <div piwik-multisites-dashboard
                     display-revenue-column=\"";
        // line 20
        if ((isset($context["displayRevenueColumn"]) || array_key_exists("displayRevenueColumn", $context) ? $context["displayRevenueColumn"] : (function () { throw new RuntimeError('Variable "displayRevenueColumn" does not exist.', 20, $this->source); })())) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\"
                     page-size=\"";
        // line 21
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["limit"]) || array_key_exists("limit", $context) ? $context["limit"] : (function () { throw new RuntimeError('Variable "limit" does not exist.', 21, $this->source); })()), "html", null, true);
        echo "\"
                     show-sparklines=\"";
        // line 22
        if ((isset($context["show_sparklines"]) || array_key_exists("show_sparklines", $context) ? $context["show_sparklines"] : (function () { throw new RuntimeError('Variable "show_sparklines" does not exist.', 22, $this->source); })())) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\"
                     date-sparkline=\"";
        // line 23
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["dateSparkline"]) || array_key_exists("dateSparkline", $context) ? $context["dateSparkline"] : (function () { throw new RuntimeError('Variable "dateSparkline" does not exist.', 23, $this->source); })()), "html", null, true);
        echo "\"
                     auto-refresh-today-report=\"";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["autoRefreshTodayReport"]) || array_key_exists("autoRefreshTodayReport", $context) ? $context["autoRefreshTodayReport"] : (function () { throw new RuntimeError('Variable "autoRefreshTodayReport" does not exist.', 24, $this->source); })()), "html", null, true);
        echo "\">
                </div>
        ";
        // line 26
        if ((isset($context["isWidgetized"]) || array_key_exists("isWidgetized", $context) ? $context["isWidgetized"] : (function () { throw new RuntimeError('Variable "isWidgetized" does not exist.', 26, $this->source); })())) {
            // line 27
            echo "            </div>
        ";
        } else {
            // line 29
            echo "            </div></div>
        ";
        }
        // line 31
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@MultiSites/getSitesInfo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 31,  121 => 29,  117 => 27,  115 => 26,  110 => 24,  106 => 23,  98 => 22,  94 => 21,  86 => 20,  83 => 19,  78 => 16,  74 => 14,  72 => 13,  68 => 11,  64 => 10,  59 => 7,  56 => 6,  53 => 5,  50 => 4,  46 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends isWidgetized ? 'empty.twig' : 'dashboard.twig' %}

{% block topcontrols %}
    {% if not isWidgetized %}
        {% include \"@CoreHome/_periodSelect.twig\" %}
        {% include \"@CoreHome/_headerMessage.twig\" %}
    {% endif %}
{% endblock %}

{% block content %}
<div class=\"row\" id=\"multisites\">
    <div class=\"col s12 m12 l10 offset-l1\">
        {% if isWidgetized %}
            <div id=\"main\">
        {% else %}
            <div id=\"main\" class=\"card\">
                <div class=\"card-content\">
        {% endif %}
                <div piwik-multisites-dashboard
                     display-revenue-column=\"{% if displayRevenueColumn %}true{% else %}false{%endif%}\"
                     page-size=\"{{ limit }}\"
                     show-sparklines=\"{% if show_sparklines %}true{% else %}false{%endif%}\"
                     date-sparkline=\"{{ dateSparkline }}\"
                     auto-refresh-today-report=\"{{ autoRefreshTodayReport }}\">
                </div>
        {% if isWidgetized %}
            </div>
        {% else %}
            </div></div>
        {% endif %}
    </div>
</div>
{% endblock %}
", "@MultiSites/getSitesInfo.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/MultiSites/templates/getSitesInfo.twig");
    }
}
