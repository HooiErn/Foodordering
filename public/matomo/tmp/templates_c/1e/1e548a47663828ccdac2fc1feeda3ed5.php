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

/* @Ecommerce/conversionOverview.twig */
class __TwigTemplate_81e5e1a9040edda3bf6965503c672b4c extends Template
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
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Goals_ConversionsOverview"), "html_attr");
        echo "\">
    <ul class=\"ulGoalTopElements\">
        <li>
        ";
        // line 5
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_ColumnRevenue"), "html", null, true);
        echo ": ";
        echo $this->env->getFilter('money')->getCallable()((isset($context["revenue"]) || array_key_exists("revenue", $context) ? $context["revenue"] : (function () { throw new RuntimeError('Variable "revenue" does not exist.', 5, $this->source); })()), (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 5, $this->source); })()));
        // line 6
        if ( !twig_test_empty((isset($context["revenue_subtotal"]) || array_key_exists("revenue_subtotal", $context) ? $context["revenue_subtotal"] : (function () { throw new RuntimeError('Variable "revenue_subtotal" does not exist.', 6, $this->source); })()))) {
            echo ",
            ";
            // line 7
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Subtotal"), "html", null, true);
            echo ": ";
            echo $this->env->getFilter('money')->getCallable()((isset($context["revenue_subtotal"]) || array_key_exists("revenue_subtotal", $context) ? $context["revenue_subtotal"] : (function () { throw new RuntimeError('Variable "revenue_subtotal" does not exist.', 7, $this->source); })()), (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 7, $this->source); })()));
        }
        // line 9
        if ( !twig_test_empty((isset($context["revenue_tax"]) || array_key_exists("revenue_tax", $context) ? $context["revenue_tax"] : (function () { throw new RuntimeError('Variable "revenue_tax" does not exist.', 9, $this->source); })()))) {
            echo ",
            ";
            // line 10
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Tax"), "html", null, true);
            echo ": ";
            echo $this->env->getFilter('money')->getCallable()((isset($context["revenue_tax"]) || array_key_exists("revenue_tax", $context) ? $context["revenue_tax"] : (function () { throw new RuntimeError('Variable "revenue_tax" does not exist.', 10, $this->source); })()), (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 10, $this->source); })()));
        }
        // line 12
        if ( !twig_test_empty((isset($context["revenue_shipping"]) || array_key_exists("revenue_shipping", $context) ? $context["revenue_shipping"] : (function () { throw new RuntimeError('Variable "revenue_shipping" does not exist.', 12, $this->source); })()))) {
            echo ",
            ";
            // line 13
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Shipping"), "html", null, true);
            echo ": ";
            echo $this->env->getFilter('money')->getCallable()((isset($context["revenue_shipping"]) || array_key_exists("revenue_shipping", $context) ? $context["revenue_shipping"] : (function () { throw new RuntimeError('Variable "revenue_shipping" does not exist.', 13, $this->source); })()), (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 13, $this->source); })()));
        }
        // line 15
        if ( !twig_test_empty((isset($context["revenue_discount"]) || array_key_exists("revenue_discount", $context) ? $context["revenue_discount"] : (function () { throw new RuntimeError('Variable "revenue_discount" does not exist.', 15, $this->source); })()))) {
            echo ",
            ";
            // line 16
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Discount"), "html", null, true);
            echo ": ";
            echo $this->env->getFilter('money')->getCallable()((isset($context["revenue_discount"]) || array_key_exists("revenue_discount", $context) ? $context["revenue_discount"] : (function () { throw new RuntimeError('Variable "revenue_discount" does not exist.', 16, $this->source); })()), (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 16, $this->source); })()));
        }
        // line 18
        echo "        </li>
    </ul>
    ";
        // line 20
        if ((isset($context["visitorLogEnabled"]) || array_key_exists("visitorLogEnabled", $context) ? $context["visitorLogEnabled"] : (function () { throw new RuntimeError('Variable "visitorLogEnabled" does not exist.', 20, $this->source); })())) {
            // line 21
            echo "    <a href=\"javascript:;\" class=\"segmentedlog\" onclick=\"SegmentedVisitorLog.show('Goals.getMetrics', 'visitConvertedGoalId==";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["idGoal"]) || array_key_exists("idGoal", $context) ? $context["idGoal"] : (function () { throw new RuntimeError('Variable "idGoal" does not exist.', 21, $this->source); })()), "html", null, true);
            echo "', {})\">
        <span class=\"icon-visitor-profile rowActionIcon\"></span> ";
            // line 22
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Live_RowActionTooltipWithDimension", $this->env->getFilter('translate')->getCallable()("General_Goal")), "html", null, true);
            echo "
    </a>
    ";
        }
        // line 25
        echo "    <br style=\"clear:left\"/>
</div>";
    }

    public function getTemplateName()
    {
        return "@Ecommerce/conversionOverview.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 25,  97 => 22,  92 => 21,  90 => 20,  86 => 18,  81 => 16,  77 => 15,  72 => 13,  68 => 12,  63 => 10,  59 => 9,  54 => 7,  50 => 6,  46 => 5,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div piwik-content-block
     content-title=\"{{ 'Goals_ConversionsOverview'|translate|e('html_attr') }}\">
    <ul class=\"ulGoalTopElements\">
        <li>
        {{ 'General_ColumnRevenue'|translate }}: {{ revenue|money(idSite)|raw -}}
        {% if revenue_subtotal is not empty %},
            {{ 'General_Subtotal'|translate }}: {{ revenue_subtotal|money(idSite)|raw -}}
        {% endif %}
        {%- if revenue_tax is not empty -%},
            {{ 'General_Tax'|translate }}: {{ revenue_tax|money(idSite)|raw -}}
        {% endif %}
        {%- if revenue_shipping is not empty -%},
            {{ 'General_Shipping'|translate }}: {{ revenue_shipping|money(idSite)|raw -}}
        {% endif %}
        {%- if revenue_discount is not empty -%},
            {{ 'General_Discount'|translate }}: {{ revenue_discount|money(idSite)|raw -}}
        {% endif %}
        </li>
    </ul>
    {% if visitorLogEnabled %}
    <a href=\"javascript:;\" class=\"segmentedlog\" onclick=\"SegmentedVisitorLog.show('Goals.getMetrics', 'visitConvertedGoalId=={{ idGoal }}', {})\">
        <span class=\"icon-visitor-profile rowActionIcon\"></span> {{ 'Live_RowActionTooltipWithDimension'|translate('General_Goal'|translate) }}
    </a>
    {% endif %}
    <br style=\"clear:left\"/>
</div>", "@Ecommerce/conversionOverview.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/Ecommerce/templates/conversionOverview.twig");
    }
}
