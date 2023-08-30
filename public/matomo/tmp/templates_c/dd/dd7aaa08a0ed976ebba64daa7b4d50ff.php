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

/* @Ecommerce/getSparklines.twig */
class __TwigTemplate_e7a93f751ab2728ac870ed5cd554fa67 extends Template
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
        echo "<div class=\"card\"><div class=\"card-content\">

<div id='leftcolumn' style=\"clear:both;";
        // line 3
        if ( !(isset($context["isWidget"]) || array_key_exists("isWidget", $context) ? $context["isWidget"] : (function () { throw new RuntimeError('Variable "isWidget" does not exist.', 3, $this->source); })())) {
            echo "width:33%;'";
        }
        echo "\">
    <div class=\"sparkline\">
        ";
        // line 5
        echo $this->env->getFunction('sparkline')->getCallable()((isset($context["urlSparklineConversions"]) || array_key_exists("urlSparklineConversions", $context) ? $context["urlSparklineConversions"] : (function () { throw new RuntimeError('Variable "urlSparklineConversions" does not exist.', 5, $this->source); })()));
        echo "
\t    <div class=\"sparkline-metrics\">
            <strong>";
        // line 7
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('number')->getCallable()((isset($context["nb_conversions"]) || array_key_exists("nb_conversions", $context) ? $context["nb_conversions"] : (function () { throw new RuntimeError('Variable "nb_conversions" does not exist.', 7, $this->source); })())), "html", null, true);
        echo "</strong>
            ";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_EcommerceOrders"), "html", null, true);
        echo "
            <img src='plugins/Morpheus/images/ecommerceOrder.png'>
            (";
        // line 10
        echo $this->env->getFilter('translate')->getCallable()("General_NVisits", (("<strong>" . (isset($context["nb_visits_converted"]) || array_key_exists("nb_visits_converted", $context) ? $context["nb_visits_converted"] : (function () { throw new RuntimeError('Variable "nb_visits_converted" does not exist.', 10, $this->source); })())) . "</strong>"));
        echo ")
        </div>
        ";
        // line 12
        if (array_key_exists("nb_conversions_trend", $context)) {
            // line 13
            echo "        <div class=\"metricEvolution\" title=\"";
            echo (isset($context["nb_conversions_tooltip"]) || array_key_exists("nb_conversions_tooltip", $context) ? $context["nb_conversions_tooltip"] : (function () { throw new RuntimeError('Variable "nb_conversions_tooltip" does not exist.', 13, $this->source); })());
            echo "\">
            ";
            // line 14
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 14, $this->source); })()) ==  -1)) {
                echo " ";
                $context["trend_icon"] = "arrow_down";
                echo " ";
                $context["trend_class"] = "negative";
                echo " ";
            }
            // line 15
            echo "            ";
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 15, $this->source); })()) == 1)) {
                echo " ";
                $context["trend_icon"] = "arrow_up";
                echo " ";
                $context["trend_class"] = "positive";
                echo " ";
            }
            // line 16
            echo "            ";
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 16, $this->source); })()) == 0)) {
                echo " ";
                $context["trend_icon"] = "stop";
                echo " ";
                $context["trend_class"] = "neutral";
                echo " ";
            }
            // line 17
            echo "            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_icon"]) || array_key_exists("trend_icon", $context) ? $context["trend_icon"] : (function () { throw new RuntimeError('Variable "trend_icon" does not exist.', 17, $this->source); })()), "html", null, true);
            echo ".png\">
            <strong class=\"";
            // line 18
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_class"]) || array_key_exists("trend_class", $context) ? $context["trend_class"] : (function () { throw new RuntimeError('Variable "trend_class" does not exist.', 18, $this->source); })()), "html", null, true);
            echo "-evolution\">";
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 18, $this->source); })()) == 1)) {
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Intl_NumberSymbolPlus"), "html", null, true);
            }
            echo (isset($context["nb_conversions_trend_percent"]) || array_key_exists("nb_conversions_trend_percent", $context) ? $context["nb_conversions_trend_percent"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend_percent" does not exist.', 18, $this->source); })());
            echo "</strong>
        </div>
        ";
        }
        // line 21
        echo "    </div>

    <div class=\"sparkline\">
        ";
        // line 24
        echo $this->env->getFunction('sparkline')->getCallable()((isset($context["urlSparklineRevenue"]) || array_key_exists("urlSparklineRevenue", $context) ? $context["urlSparklineRevenue"] : (function () { throw new RuntimeError('Variable "urlSparklineRevenue" does not exist.', 24, $this->source); })()));
        echo "
\t    <div class=\"sparkline-metrics\">
            ";
        // line 26
        $context["revenue"] = $this->env->getFilter('money')->getCallable()((isset($context["revenue"]) || array_key_exists("revenue", $context) ? $context["revenue"] : (function () { throw new RuntimeError('Variable "revenue" does not exist.', 26, $this->source); })()), (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 26, $this->source); })()));
        // line 27
        echo "            <strong>";
        echo (isset($context["revenue"]) || array_key_exists("revenue", $context) ? $context["revenue"] : (function () { throw new RuntimeError('Variable "revenue" does not exist.', 27, $this->source); })());
        echo "</strong> ";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_TotalRevenue"), "html", null, true);
        echo "
\t    </div>
        ";
        // line 29
        if (array_key_exists("revenue_trend", $context)) {
            // line 30
            echo "        <div class=\"metricEvolution\" title=\"";
            echo (isset($context["revenue_tooltip"]) || array_key_exists("revenue_tooltip", $context) ? $context["revenue_tooltip"] : (function () { throw new RuntimeError('Variable "revenue_tooltip" does not exist.', 30, $this->source); })());
            echo "\">
            ";
            // line 31
            if (((isset($context["revenue_trend"]) || array_key_exists("revenue_trend", $context) ? $context["revenue_trend"] : (function () { throw new RuntimeError('Variable "revenue_trend" does not exist.', 31, $this->source); })()) ==  -1)) {
                echo " ";
                $context["trend_icon"] = "arrow_down";
                echo " ";
                $context["trend_class"] = "negative";
                echo " ";
            }
            // line 32
            echo "            ";
            if (((isset($context["revenue_trend"]) || array_key_exists("revenue_trend", $context) ? $context["revenue_trend"] : (function () { throw new RuntimeError('Variable "revenue_trend" does not exist.', 32, $this->source); })()) == 1)) {
                echo " ";
                $context["trend_icon"] = "arrow_up";
                echo " ";
                $context["trend_class"] = "positive";
                echo " ";
            }
            // line 33
            echo "            ";
            if (((isset($context["revenue_trend"]) || array_key_exists("revenue_trend", $context) ? $context["revenue_trend"] : (function () { throw new RuntimeError('Variable "revenue_trend" does not exist.', 33, $this->source); })()) == 0)) {
                echo " ";
                $context["trend_icon"] = "stop";
                echo " ";
                $context["trend_class"] = "neutral";
                echo " ";
            }
            // line 34
            echo "            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_icon"]) || array_key_exists("trend_icon", $context) ? $context["trend_icon"] : (function () { throw new RuntimeError('Variable "trend_icon" does not exist.', 34, $this->source); })()), "html", null, true);
            echo ".png\">
            <strong class=\"";
            // line 35
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_class"]) || array_key_exists("trend_class", $context) ? $context["trend_class"] : (function () { throw new RuntimeError('Variable "trend_class" does not exist.', 35, $this->source); })()), "html", null, true);
            echo "-evolution\">";
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 35, $this->source); })()) == 1)) {
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Intl_NumberSymbolPlus"), "html", null, true);
            }
            echo (isset($context["revenue_trend_percent"]) || array_key_exists("revenue_trend_percent", $context) ? $context["revenue_trend_percent"] : (function () { throw new RuntimeError('Variable "revenue_trend_percent" does not exist.', 35, $this->source); })());
            echo "</strong>
        </div>
        ";
        }
        // line 38
        echo "    </div>

    <div class=\"sparkline\">
        ";
        // line 41
        echo $this->env->getFunction('sparkline')->getCallable()((isset($context["urlSparklineAverageOrderValue"]) || array_key_exists("urlSparklineAverageOrderValue", $context) ? $context["urlSparklineAverageOrderValue"] : (function () { throw new RuntimeError('Variable "urlSparklineAverageOrderValue" does not exist.', 41, $this->source); })()));
        echo "
        <div class=\"sparkline-metrics\">
            <strong>";
        // line 43
        echo $this->env->getFilter('money')->getCallable()((isset($context["avg_order_revenue"]) || array_key_exists("avg_order_revenue", $context) ? $context["avg_order_revenue"] : (function () { throw new RuntimeError('Variable "avg_order_revenue" does not exist.', 43, $this->source); })()), (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 43, $this->source); })()));
        echo "</strong>
            ";
        // line 44
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_AverageOrderValue"), "html", null, true);
        echo "
        </div>
        ";
        // line 46
        if (array_key_exists("avg_order_revenue_trend", $context)) {
            // line 47
            echo "        <div class=\"metricEvolution\" title=\"";
            echo (isset($context["avg_order_revenue_tooltip"]) || array_key_exists("avg_order_revenue_tooltip", $context) ? $context["avg_order_revenue_tooltip"] : (function () { throw new RuntimeError('Variable "avg_order_revenue_tooltip" does not exist.', 47, $this->source); })());
            echo "\">
            ";
            // line 48
            if (((isset($context["avg_order_revenue_trend"]) || array_key_exists("avg_order_revenue_trend", $context) ? $context["avg_order_revenue_trend"] : (function () { throw new RuntimeError('Variable "avg_order_revenue_trend" does not exist.', 48, $this->source); })()) ==  -1)) {
                echo " ";
                $context["trend_icon"] = "arrow_down";
                echo " ";
                $context["trend_class"] = "negative";
                echo " ";
            }
            // line 49
            echo "            ";
            if (((isset($context["avg_order_revenue_trend"]) || array_key_exists("avg_order_revenue_trend", $context) ? $context["avg_order_revenue_trend"] : (function () { throw new RuntimeError('Variable "avg_order_revenue_trend" does not exist.', 49, $this->source); })()) == 1)) {
                echo " ";
                $context["trend_icon"] = "arrow_up";
                echo " ";
                $context["trend_class"] = "positive";
                echo " ";
            }
            // line 50
            echo "            ";
            if (((isset($context["avg_order_revenue_trend"]) || array_key_exists("avg_order_revenue_trend", $context) ? $context["avg_order_revenue_trend"] : (function () { throw new RuntimeError('Variable "avg_order_revenue_trend" does not exist.', 50, $this->source); })()) == 0)) {
                echo " ";
                $context["trend_icon"] = "stop";
                echo " ";
                $context["trend_class"] = "neutral";
                echo " ";
            }
            // line 51
            echo "            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_icon"]) || array_key_exists("trend_icon", $context) ? $context["trend_icon"] : (function () { throw new RuntimeError('Variable "trend_icon" does not exist.', 51, $this->source); })()), "html", null, true);
            echo ".png\">
            <strong class=\"";
            // line 52
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_class"]) || array_key_exists("trend_class", $context) ? $context["trend_class"] : (function () { throw new RuntimeError('Variable "trend_class" does not exist.', 52, $this->source); })()), "html", null, true);
            echo "-evolution\">";
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 52, $this->source); })()) == 1)) {
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Intl_NumberSymbolPlus"), "html", null, true);
            }
            echo (isset($context["avg_order_revenue_trend_percent"]) || array_key_exists("avg_order_revenue_trend_percent", $context) ? $context["avg_order_revenue_trend_percent"] : (function () { throw new RuntimeError('Variable "avg_order_revenue_trend_percent" does not exist.', 52, $this->source); })());
            echo "</strong>
        </div>
        ";
        }
        // line 55
        echo "    </div>

</div>

<div id='leftcolumn' ";
        // line 59
        if ( !(isset($context["isWidget"]) || array_key_exists("isWidget", $context) ? $context["isWidget"] : (function () { throw new RuntimeError('Variable "isWidget" does not exist.', 59, $this->source); })())) {
            echo "style='width:33%;'";
        }
        echo ">

    <div class=\"sparkline\">
        ";
        // line 62
        echo $this->env->getFunction('sparkline')->getCallable()((isset($context["urlSparklineConversionRate"]) || array_key_exists("urlSparklineConversionRate", $context) ? $context["urlSparklineConversionRate"] : (function () { throw new RuntimeError('Variable "urlSparklineConversionRate" does not exist.', 62, $this->source); })()));
        echo "
        <div class=\"sparkline-metrics\">
            ";
        // line 64
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_EcommerceOrders"), "html", null, true);
        $context["ecommerceOrdersText"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 65
        echo "            ";
        echo $this->env->getFilter('translate')->getCallable()("Goals_ConversionRate", ((("<strong>" . $this->env->getFilter('percent')->getCallable()((isset($context["conversion_rate"]) || array_key_exists("conversion_rate", $context) ? $context["conversion_rate"] : (function () { throw new RuntimeError('Variable "conversion_rate" does not exist.', 65, $this->source); })()))) . "</strong> ") . (isset($context["ecommerceOrdersText"]) || array_key_exists("ecommerceOrdersText", $context) ? $context["ecommerceOrdersText"] : (function () { throw new RuntimeError('Variable "ecommerceOrdersText" does not exist.', 65, $this->source); })())));
        echo "
        </div>
        ";
        // line 67
        if (array_key_exists("conversion_rate_trend", $context)) {
            // line 68
            echo "        <div class=\"metricEvolution\" title=\"";
            echo (isset($context["conversion_rate_tooltip"]) || array_key_exists("conversion_rate_tooltip", $context) ? $context["conversion_rate_tooltip"] : (function () { throw new RuntimeError('Variable "conversion_rate_tooltip" does not exist.', 68, $this->source); })());
            echo "\">
            ";
            // line 69
            if (((isset($context["conversion_rate_trend"]) || array_key_exists("conversion_rate_trend", $context) ? $context["conversion_rate_trend"] : (function () { throw new RuntimeError('Variable "conversion_rate_trend" does not exist.', 69, $this->source); })()) ==  -1)) {
                echo " ";
                $context["trend_icon"] = "arrow_down";
                echo " ";
                $context["trend_class"] = "negative";
                echo " ";
            }
            // line 70
            echo "            ";
            if (((isset($context["conversion_rate_trend"]) || array_key_exists("conversion_rate_trend", $context) ? $context["conversion_rate_trend"] : (function () { throw new RuntimeError('Variable "conversion_rate_trend" does not exist.', 70, $this->source); })()) == 1)) {
                echo " ";
                $context["trend_icon"] = "arrow_up";
                echo " ";
                $context["trend_class"] = "positive";
                echo " ";
            }
            // line 71
            echo "            ";
            if (((isset($context["conversion_rate_trend"]) || array_key_exists("conversion_rate_trend", $context) ? $context["conversion_rate_trend"] : (function () { throw new RuntimeError('Variable "conversion_rate_trend" does not exist.', 71, $this->source); })()) == 0)) {
                echo " ";
                $context["trend_icon"] = "stop";
                echo " ";
                $context["trend_class"] = "neutral";
                echo " ";
            }
            // line 72
            echo "            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_icon"]) || array_key_exists("trend_icon", $context) ? $context["trend_icon"] : (function () { throw new RuntimeError('Variable "trend_icon" does not exist.', 72, $this->source); })()), "html", null, true);
            echo ".png\">
            <strong class=\"";
            // line 73
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_class"]) || array_key_exists("trend_class", $context) ? $context["trend_class"] : (function () { throw new RuntimeError('Variable "trend_class" does not exist.', 73, $this->source); })()), "html", null, true);
            echo "-evolution\">";
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 73, $this->source); })()) == 1)) {
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Intl_NumberSymbolPlus"), "html", null, true);
            }
            echo (isset($context["conversion_rate_trend_percent"]) || array_key_exists("conversion_rate_trend_percent", $context) ? $context["conversion_rate_trend_percent"] : (function () { throw new RuntimeError('Variable "conversion_rate_trend_percent" does not exist.', 73, $this->source); })());
            echo "</strong>
        </div>
        ";
        }
        // line 76
        echo "    </div>

    <div class=\"sparkline\">
        ";
        // line 79
        echo $this->env->getFunction('sparkline')->getCallable()((isset($context["urlSparklinePurchasedProducts"]) || array_key_exists("urlSparklinePurchasedProducts", $context) ? $context["urlSparklinePurchasedProducts"] : (function () { throw new RuntimeError('Variable "urlSparklinePurchasedProducts" does not exist.', 79, $this->source); })()));
        echo "
\t    <div class=\"sparkline-metrics\">
            <strong>";
        // line 81
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('number')->getCallable()((isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 81, $this->source); })())), "html", null, true);
        echo "</strong> ";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_PurchasedProducts"), "html", null, true);
        echo "
        </div>
        ";
        // line 83
        if (array_key_exists("items_trend", $context)) {
            // line 84
            echo "        <div class=\"metricEvolution\" title=\"";
            echo (isset($context["items_tooltip"]) || array_key_exists("items_tooltip", $context) ? $context["items_tooltip"] : (function () { throw new RuntimeError('Variable "items_tooltip" does not exist.', 84, $this->source); })());
            echo "\">
            ";
            // line 85
            if (((isset($context["items_trend"]) || array_key_exists("items_trend", $context) ? $context["items_trend"] : (function () { throw new RuntimeError('Variable "items_trend" does not exist.', 85, $this->source); })()) ==  -1)) {
                echo " ";
                $context["trend_icon"] = "arrow_down";
                echo " ";
                $context["trend_class"] = "negative";
                echo " ";
            }
            // line 86
            echo "            ";
            if (((isset($context["items_trend"]) || array_key_exists("items_trend", $context) ? $context["items_trend"] : (function () { throw new RuntimeError('Variable "items_trend" does not exist.', 86, $this->source); })()) == 1)) {
                echo " ";
                $context["trend_icon"] = "arrow_up";
                echo " ";
                $context["trend_class"] = "positive";
                echo " ";
            }
            // line 87
            echo "            ";
            if (((isset($context["items_trend"]) || array_key_exists("items_trend", $context) ? $context["items_trend"] : (function () { throw new RuntimeError('Variable "items_trend" does not exist.', 87, $this->source); })()) == 0)) {
                echo " ";
                $context["trend_icon"] = "stop";
                echo " ";
                $context["trend_class"] = "neutral";
                echo " ";
            }
            // line 88
            echo "            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_icon"]) || array_key_exists("trend_icon", $context) ? $context["trend_icon"] : (function () { throw new RuntimeError('Variable "trend_icon" does not exist.', 88, $this->source); })()), "html", null, true);
            echo ".png\">
            <strong class=\"";
            // line 89
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_class"]) || array_key_exists("trend_class", $context) ? $context["trend_class"] : (function () { throw new RuntimeError('Variable "trend_class" does not exist.', 89, $this->source); })()), "html", null, true);
            echo "-evolution\">";
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 89, $this->source); })()) == 1)) {
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Intl_NumberSymbolPlus"), "html", null, true);
            }
            echo (isset($context["items_trend_percent"]) || array_key_exists("items_trend_percent", $context) ? $context["items_trend_percent"] : (function () { throw new RuntimeError('Variable "items_trend_percent" does not exist.', 89, $this->source); })());
            echo "</strong>
        </div>
        ";
        }
        // line 92
        echo "    </div>

</div>

<div id='rightcolumn' ";
        // line 96
        if ( !(isset($context["isWidget"]) || array_key_exists("isWidget", $context) ? $context["isWidget"] : (function () { throw new RuntimeError('Variable "isWidget" does not exist.', 96, $this->source); })())) {
            echo "style='width:30%;'";
        }
        echo ">
    <div>
        <img src='plugins/Morpheus/images/ecommerceAbandonedCart.png'> ";
        // line 98
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_AbandonedCarts"), "html", null, true);
        echo "
    </div>

    <div class=\"sparkline\">
        ";
        // line 102
        echo $this->env->getFunction('sparkline')->getCallable()((isset($context["cart_urlSparklineConversions"]) || array_key_exists("cart_urlSparklineConversions", $context) ? $context["cart_urlSparklineConversions"] : (function () { throw new RuntimeError('Variable "cart_urlSparklineConversions" does not exist.', 102, $this->source); })()));
        echo "
\t    <div class=\"sparkline-metrics\">
            ";
        // line 104
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Goals_AbandonedCart"), "html", null, true);
        $context["ecommerceAbandonedCartsText"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 105
        echo "            <strong>";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('number')->getCallable()((isset($context["cart_nb_conversions"]) || array_key_exists("cart_nb_conversions", $context) ? $context["cart_nb_conversions"] : (function () { throw new RuntimeError('Variable "cart_nb_conversions" does not exist.', 105, $this->source); })())), "html", null, true);
        echo "</strong> ";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_VisitsWith", (isset($context["ecommerceAbandonedCartsText"]) || array_key_exists("ecommerceAbandonedCartsText", $context) ? $context["ecommerceAbandonedCartsText"] : (function () { throw new RuntimeError('Variable "ecommerceAbandonedCartsText" does not exist.', 105, $this->source); })())), "html", null, true);
        echo "
\t    </div>
        ";
        // line 107
        if (array_key_exists("cart_nb_conversions_trend", $context)) {
            // line 108
            echo "        <div class=\"metricEvolution\" title=\"";
            echo (isset($context["cart_nb_conversions_tooltip"]) || array_key_exists("cart_nb_conversions_tooltip", $context) ? $context["cart_nb_conversions_tooltip"] : (function () { throw new RuntimeError('Variable "cart_nb_conversions_tooltip" does not exist.', 108, $this->source); })());
            echo "\">
            ";
            // line 109
            if (((isset($context["cart_nb_conversions_trend"]) || array_key_exists("cart_nb_conversions_trend", $context) ? $context["cart_nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "cart_nb_conversions_trend" does not exist.', 109, $this->source); })()) ==  -1)) {
                echo " ";
                $context["trend_icon"] = "arrow_down";
                echo " ";
                $context["trend_class"] = "negative";
                echo " ";
            }
            // line 110
            echo "            ";
            if (((isset($context["cart_nb_conversions_trend"]) || array_key_exists("cart_nb_conversions_trend", $context) ? $context["cart_nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "cart_nb_conversions_trend" does not exist.', 110, $this->source); })()) == 1)) {
                echo " ";
                $context["trend_icon"] = "arrow_up";
                echo " ";
                $context["trend_class"] = "positive";
                echo " ";
            }
            // line 111
            echo "            ";
            if (((isset($context["cart_nb_conversions_trend"]) || array_key_exists("cart_nb_conversions_trend", $context) ? $context["cart_nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "cart_nb_conversions_trend" does not exist.', 111, $this->source); })()) == 0)) {
                echo " ";
                $context["trend_icon"] = "stop";
                echo " ";
                $context["trend_class"] = "neutral";
                echo " ";
            }
            // line 112
            echo "            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_icon"]) || array_key_exists("trend_icon", $context) ? $context["trend_icon"] : (function () { throw new RuntimeError('Variable "trend_icon" does not exist.', 112, $this->source); })()), "html", null, true);
            echo ".png\">
            <strong class=\"";
            // line 113
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_class"]) || array_key_exists("trend_class", $context) ? $context["trend_class"] : (function () { throw new RuntimeError('Variable "trend_class" does not exist.', 113, $this->source); })()), "html", null, true);
            echo "-evolution\">";
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 113, $this->source); })()) == 1)) {
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Intl_NumberSymbolPlus"), "html", null, true);
            }
            echo (isset($context["cart_nb_conversions_trend_percent"]) || array_key_exists("cart_nb_conversions_trend_percent", $context) ? $context["cart_nb_conversions_trend_percent"] : (function () { throw new RuntimeError('Variable "cart_nb_conversions_trend_percent" does not exist.', 113, $this->source); })());
            echo "</strong>
        </div>
        ";
        }
        // line 116
        echo "    </div>

    <div class=\"sparkline\">
        ";
        // line 119
        echo $this->env->getFunction('sparkline')->getCallable()((isset($context["cart_urlSparklineRevenue"]) || array_key_exists("cart_urlSparklineRevenue", $context) ? $context["cart_urlSparklineRevenue"] : (function () { throw new RuntimeError('Variable "cart_urlSparklineRevenue" does not exist.', 119, $this->source); })()));
        echo "
\t    <div class=\"sparkline-metrics\">
            ";
        // line 121
        ob_start();
        echo $this->env->getFilter('money')->getCallable()((isset($context["cart_revenue"]) || array_key_exists("cart_revenue", $context) ? $context["cart_revenue"] : (function () { throw new RuntimeError('Variable "cart_revenue" does not exist.', 121, $this->source); })()), (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 121, $this->source); })()));
        $context["revenue"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 122
        echo "            ";
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_ColumnRevenue"), "html", null, true);
        $context["revenueText"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 123
        echo "            <strong>";
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["revenue"]) || array_key_exists("revenue", $context) ? $context["revenue"] : (function () { throw new RuntimeError('Variable "revenue" does not exist.', 123, $this->source); })()), "html", null, true);
        echo "</strong> ";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Goals_LeftInCart", (isset($context["revenueText"]) || array_key_exists("revenueText", $context) ? $context["revenueText"] : (function () { throw new RuntimeError('Variable "revenueText" does not exist.', 123, $this->source); })())), "html", null, true);
        echo "
\t    </div>
        ";
        // line 125
        if (array_key_exists("cart_revenue_trend", $context)) {
            // line 126
            echo "        <div class=\"metricEvolution\" title=\"";
            echo (isset($context["cart_revenue_tooltip"]) || array_key_exists("cart_revenue_tooltip", $context) ? $context["cart_revenue_tooltip"] : (function () { throw new RuntimeError('Variable "cart_revenue_tooltip" does not exist.', 126, $this->source); })());
            echo "\">
            ";
            // line 127
            if (((isset($context["cart_revenue_trend"]) || array_key_exists("cart_revenue_trend", $context) ? $context["cart_revenue_trend"] : (function () { throw new RuntimeError('Variable "cart_revenue_trend" does not exist.', 127, $this->source); })()) ==  -1)) {
                echo " ";
                $context["trend_icon"] = "arrow_down";
                echo " ";
                $context["trend_class"] = "negative";
                echo " ";
            }
            // line 128
            echo "            ";
            if (((isset($context["cart_revenue_trend"]) || array_key_exists("cart_revenue_trend", $context) ? $context["cart_revenue_trend"] : (function () { throw new RuntimeError('Variable "cart_revenue_trend" does not exist.', 128, $this->source); })()) == 1)) {
                echo " ";
                $context["trend_icon"] = "arrow_up";
                echo " ";
                $context["trend_class"] = "positive";
                echo " ";
            }
            // line 129
            echo "            ";
            if (((isset($context["cart_revenue_trend"]) || array_key_exists("cart_revenue_trend", $context) ? $context["cart_revenue_trend"] : (function () { throw new RuntimeError('Variable "cart_revenue_trend" does not exist.', 129, $this->source); })()) == 0)) {
                echo " ";
                $context["trend_icon"] = "stop";
                echo " ";
                $context["trend_class"] = "neutral";
                echo " ";
            }
            // line 130
            echo "            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_icon"]) || array_key_exists("trend_icon", $context) ? $context["trend_icon"] : (function () { throw new RuntimeError('Variable "trend_icon" does not exist.', 130, $this->source); })()), "html", null, true);
            echo ".png\">
            <strong class=\"";
            // line 131
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_class"]) || array_key_exists("trend_class", $context) ? $context["trend_class"] : (function () { throw new RuntimeError('Variable "trend_class" does not exist.', 131, $this->source); })()), "html", null, true);
            echo "-evolution\">";
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 131, $this->source); })()) == 1)) {
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Intl_NumberSymbolPlus"), "html", null, true);
            }
            echo (isset($context["cart_revenue_trend_percent"]) || array_key_exists("cart_revenue_trend_percent", $context) ? $context["cart_revenue_trend_percent"] : (function () { throw new RuntimeError('Variable "cart_revenue_trend_percent" does not exist.', 131, $this->source); })());
            echo "</strong>
        </div>
        ";
        }
        // line 134
        echo "    </div>

    <div class=\"sparkline\">
        ";
        // line 137
        echo $this->env->getFunction('sparkline')->getCallable()((isset($context["cart_urlSparklineConversionRate"]) || array_key_exists("cart_urlSparklineConversionRate", $context) ? $context["cart_urlSparklineConversionRate"] : (function () { throw new RuntimeError('Variable "cart_urlSparklineConversionRate" does not exist.', 137, $this->source); })()));
        echo "
\t    <div class=\"sparkline-metrics\">
            <strong>";
        // line 139
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('percent')->getCallable()((isset($context["cart_conversion_rate"]) || array_key_exists("cart_conversion_rate", $context) ? $context["cart_conversion_rate"] : (function () { throw new RuntimeError('Variable "cart_conversion_rate" does not exist.', 139, $this->source); })())), "html", null, true);
        echo "</strong>
            ";
        // line 140
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_VisitsWith", (isset($context["ecommerceAbandonedCartsText"]) || array_key_exists("ecommerceAbandonedCartsText", $context) ? $context["ecommerceAbandonedCartsText"] : (function () { throw new RuntimeError('Variable "ecommerceAbandonedCartsText" does not exist.', 140, $this->source); })())), "html", null, true);
        echo "
\t    </div>
        ";
        // line 142
        if (array_key_exists("cart_conversion_rate_trend", $context)) {
            // line 143
            echo "        <div class=\"metricEvolution\" title=\"";
            echo (isset($context["cart_conversion_rate_tooltip"]) || array_key_exists("cart_conversion_rate_tooltip", $context) ? $context["cart_conversion_rate_tooltip"] : (function () { throw new RuntimeError('Variable "cart_conversion_rate_tooltip" does not exist.', 143, $this->source); })());
            echo "\">
            ";
            // line 144
            if (((isset($context["cart_conversion_rate_trend"]) || array_key_exists("cart_conversion_rate_trend", $context) ? $context["cart_conversion_rate_trend"] : (function () { throw new RuntimeError('Variable "cart_conversion_rate_trend" does not exist.', 144, $this->source); })()) ==  -1)) {
                echo " ";
                $context["trend_icon"] = "arrow_down";
                echo " ";
                $context["trend_class"] = "negative";
                echo " ";
            }
            // line 145
            echo "            ";
            if (((isset($context["cart_conversion_rate_trend"]) || array_key_exists("cart_conversion_rate_trend", $context) ? $context["cart_conversion_rate_trend"] : (function () { throw new RuntimeError('Variable "cart_conversion_rate_trend" does not exist.', 145, $this->source); })()) == 1)) {
                echo " ";
                $context["trend_icon"] = "arrow_up";
                echo " ";
                $context["trend_class"] = "positive";
                echo " ";
            }
            // line 146
            echo "            ";
            if (((isset($context["cart_conversion_rate_trend"]) || array_key_exists("cart_conversion_rate_trend", $context) ? $context["cart_conversion_rate_trend"] : (function () { throw new RuntimeError('Variable "cart_conversion_rate_trend" does not exist.', 146, $this->source); })()) == 0)) {
                echo " ";
                $context["trend_icon"] = "stop";
                echo " ";
                $context["trend_class"] = "neutral";
                echo " ";
            }
            // line 147
            echo "            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_icon"]) || array_key_exists("trend_icon", $context) ? $context["trend_icon"] : (function () { throw new RuntimeError('Variable "trend_icon" does not exist.', 147, $this->source); })()), "html", null, true);
            echo ".png\">
            <strong class=\"";
            // line 148
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["trend_class"]) || array_key_exists("trend_class", $context) ? $context["trend_class"] : (function () { throw new RuntimeError('Variable "trend_class" does not exist.', 148, $this->source); })()), "html", null, true);
            echo "-evolution\">";
            if (((isset($context["nb_conversions_trend"]) || array_key_exists("nb_conversions_trend", $context) ? $context["nb_conversions_trend"] : (function () { throw new RuntimeError('Variable "nb_conversions_trend" does not exist.', 148, $this->source); })()) == 1)) {
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Intl_NumberSymbolPlus"), "html", null, true);
            }
            echo (isset($context["cart_conversion_rate_trend_percent"]) || array_key_exists("cart_conversion_rate_trend_percent", $context) ? $context["cart_conversion_rate_trend_percent"] : (function () { throw new RuntimeError('Variable "cart_conversion_rate_trend_percent" does not exist.', 148, $this->source); })());
            echo "</strong>
        </div>
        ";
        }
        // line 151
        echo "    </div>

</div>
<div style=\"clear: left;\"></div>
";
        // line 155
        $this->loadTemplate("_sparklineFooter.twig", "@Ecommerce/getSparklines.twig", 155)->display($context);
        // line 156
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Ecommerce/getSparklines.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  635 => 156,  633 => 155,  627 => 151,  616 => 148,  611 => 147,  602 => 146,  593 => 145,  585 => 144,  580 => 143,  578 => 142,  573 => 140,  569 => 139,  564 => 137,  559 => 134,  548 => 131,  543 => 130,  534 => 129,  525 => 128,  517 => 127,  512 => 126,  510 => 125,  502 => 123,  497 => 122,  493 => 121,  488 => 119,  483 => 116,  472 => 113,  467 => 112,  458 => 111,  449 => 110,  441 => 109,  436 => 108,  434 => 107,  426 => 105,  422 => 104,  417 => 102,  410 => 98,  403 => 96,  397 => 92,  386 => 89,  381 => 88,  372 => 87,  363 => 86,  355 => 85,  350 => 84,  348 => 83,  341 => 81,  336 => 79,  331 => 76,  320 => 73,  315 => 72,  306 => 71,  297 => 70,  289 => 69,  284 => 68,  282 => 67,  276 => 65,  272 => 64,  267 => 62,  259 => 59,  253 => 55,  242 => 52,  237 => 51,  228 => 50,  219 => 49,  211 => 48,  206 => 47,  204 => 46,  199 => 44,  195 => 43,  190 => 41,  185 => 38,  174 => 35,  169 => 34,  160 => 33,  151 => 32,  143 => 31,  138 => 30,  136 => 29,  128 => 27,  126 => 26,  121 => 24,  116 => 21,  105 => 18,  100 => 17,  91 => 16,  82 => 15,  74 => 14,  69 => 13,  67 => 12,  62 => 10,  57 => 8,  53 => 7,  48 => 5,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"card\"><div class=\"card-content\">

<div id='leftcolumn' style=\"clear:both;{% if not isWidget %}width:33%;'{% endif %}\">
    <div class=\"sparkline\">
        {{ sparkline(urlSparklineConversions) }}
\t    <div class=\"sparkline-metrics\">
            <strong>{{ nb_conversions|number }}</strong>
            {{ 'General_EcommerceOrders'|translate }}
            <img src='plugins/Morpheus/images/ecommerceOrder.png'>
            ({{ 'General_NVisits'|translate(\"<strong>\"~nb_visits_converted~\"</strong>\")|raw }})
        </div>
        {% if nb_conversions_trend is defined %}
        <div class=\"metricEvolution\" title=\"{{ nb_conversions_tooltip|raw }}\">
            {% if nb_conversions_trend == -1 %} {% set trend_icon='arrow_down' %} {% set trend_class='negative' %} {% endif %}
            {% if nb_conversions_trend == 1 %} {% set trend_icon='arrow_up' %} {% set trend_class='positive' %} {% endif %}
            {% if nb_conversions_trend == 0 %} {% set trend_icon='stop' %} {% set trend_class='neutral' %} {% endif %}
            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/{{ trend_icon }}.png\">
            <strong class=\"{{ trend_class }}-evolution\">{% if nb_conversions_trend == 1 %}{{'Intl_NumberSymbolPlus'|translate}}{% endif %}{{ nb_conversions_trend_percent|raw }}</strong>
        </div>
        {% endif %}
    </div>

    <div class=\"sparkline\">
        {{ sparkline(urlSparklineRevenue) }}
\t    <div class=\"sparkline-metrics\">
            {% set revenue=revenue|money(idSite) %}
            <strong>{{ revenue|raw }}</strong> {{ 'General_TotalRevenue'|translate }}
\t    </div>
        {% if revenue_trend is defined %}
        <div class=\"metricEvolution\" title=\"{{ revenue_tooltip|raw }}\">
            {% if revenue_trend == -1 %} {% set trend_icon='arrow_down' %} {% set trend_class='negative' %} {% endif %}
            {% if revenue_trend == 1 %} {% set trend_icon='arrow_up' %} {% set trend_class='positive' %} {% endif %}
            {% if revenue_trend == 0 %} {% set trend_icon='stop' %} {% set trend_class='neutral' %} {% endif %}
            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/{{ trend_icon }}.png\">
            <strong class=\"{{ trend_class }}-evolution\">{% if nb_conversions_trend == 1 %}{{'Intl_NumberSymbolPlus'|translate}}{% endif %}{{ revenue_trend_percent|raw }}</strong>
        </div>
        {% endif %}
    </div>

    <div class=\"sparkline\">
        {{ sparkline(urlSparklineAverageOrderValue) }}
        <div class=\"sparkline-metrics\">
            <strong>{{ avg_order_revenue|money(idSite)|raw }}</strong>
            {{ 'General_AverageOrderValue'|translate }}
        </div>
        {% if avg_order_revenue_trend is defined %}
        <div class=\"metricEvolution\" title=\"{{ avg_order_revenue_tooltip|raw }}\">
            {% if avg_order_revenue_trend == -1 %} {% set trend_icon='arrow_down' %} {% set trend_class='negative' %} {% endif %}
            {% if avg_order_revenue_trend == 1 %} {% set trend_icon='arrow_up' %} {% set trend_class='positive' %} {% endif %}
            {% if avg_order_revenue_trend == 0 %} {% set trend_icon='stop' %} {% set trend_class='neutral' %} {% endif %}
            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/{{ trend_icon }}.png\">
            <strong class=\"{{ trend_class }}-evolution\">{% if nb_conversions_trend == 1 %}{{'Intl_NumberSymbolPlus'|translate}}{% endif %}{{ avg_order_revenue_trend_percent|raw }}</strong>
        </div>
        {% endif %}
    </div>

</div>

<div id='leftcolumn' {% if not isWidget %}style='width:33%;'{% endif %}>

    <div class=\"sparkline\">
        {{ sparkline(urlSparklineConversionRate) }}
        <div class=\"sparkline-metrics\">
            {% set ecommerceOrdersText %}{{ 'General_EcommerceOrders'|translate }}{% endset %}
            {{ 'Goals_ConversionRate'|translate(\"<strong>\"~conversion_rate|percent~\"</strong> \"~ecommerceOrdersText)|raw }}
        </div>
        {% if conversion_rate_trend is defined %}
        <div class=\"metricEvolution\" title=\"{{ conversion_rate_tooltip|raw }}\">
            {% if conversion_rate_trend == -1 %} {% set trend_icon='arrow_down' %} {% set trend_class='negative' %} {% endif %}
            {% if conversion_rate_trend == 1 %} {% set trend_icon='arrow_up' %} {% set trend_class='positive' %} {% endif %}
            {% if conversion_rate_trend == 0 %} {% set trend_icon='stop' %} {% set trend_class='neutral' %} {% endif %}
            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/{{ trend_icon }}.png\">
            <strong class=\"{{ trend_class }}-evolution\">{% if nb_conversions_trend == 1 %}{{'Intl_NumberSymbolPlus'|translate}}{% endif %}{{ conversion_rate_trend_percent|raw }}</strong>
        </div>
        {% endif %}
    </div>

    <div class=\"sparkline\">
        {{ sparkline(urlSparklinePurchasedProducts) }}
\t    <div class=\"sparkline-metrics\">
            <strong>{{ items|number }}</strong> {{ 'General_PurchasedProducts'|translate }}
        </div>
        {% if items_trend is defined %}
        <div class=\"metricEvolution\" title=\"{{ items_tooltip|raw }}\">
            {% if items_trend == -1 %} {% set trend_icon='arrow_down' %} {% set trend_class='negative' %} {% endif %}
            {% if items_trend == 1 %} {% set trend_icon='arrow_up' %} {% set trend_class='positive' %} {% endif %}
            {% if items_trend == 0 %} {% set trend_icon='stop' %} {% set trend_class='neutral' %} {% endif %}
            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/{{ trend_icon }}.png\">
            <strong class=\"{{ trend_class }}-evolution\">{% if nb_conversions_trend == 1 %}{{'Intl_NumberSymbolPlus'|translate}}{% endif %}{{ items_trend_percent|raw }}</strong>
        </div>
        {% endif %}
    </div>

</div>

<div id='rightcolumn' {% if not isWidget %}style='width:30%;'{% endif %}>
    <div>
        <img src='plugins/Morpheus/images/ecommerceAbandonedCart.png'> {{ 'General_AbandonedCarts'|translate }}
    </div>

    <div class=\"sparkline\">
        {{ sparkline(cart_urlSparklineConversions) }}
\t    <div class=\"sparkline-metrics\">
            {% set ecommerceAbandonedCartsText %}{{ 'Goals_AbandonedCart'|translate }}{% endset %}
            <strong>{{ cart_nb_conversions|number }}</strong> {{ 'General_VisitsWith'|translate(ecommerceAbandonedCartsText) }}
\t    </div>
        {% if cart_nb_conversions_trend is defined %}
        <div class=\"metricEvolution\" title=\"{{ cart_nb_conversions_tooltip|raw }}\">
            {% if cart_nb_conversions_trend == -1 %} {% set trend_icon='arrow_down' %} {% set trend_class='negative' %} {% endif %}
            {% if cart_nb_conversions_trend == 1 %} {% set trend_icon='arrow_up' %} {% set trend_class='positive' %} {% endif %}
            {% if cart_nb_conversions_trend == 0 %} {% set trend_icon='stop' %} {% set trend_class='neutral' %} {% endif %}
            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/{{ trend_icon }}.png\">
            <strong class=\"{{ trend_class }}-evolution\">{% if nb_conversions_trend == 1 %}{{'Intl_NumberSymbolPlus'|translate}}{% endif %}{{ cart_nb_conversions_trend_percent|raw }}</strong>
        </div>
        {% endif %}
    </div>

    <div class=\"sparkline\">
        {{ sparkline(cart_urlSparklineRevenue) }}
\t    <div class=\"sparkline-metrics\">
            {% set revenue %}{{ cart_revenue|money(idSite)|raw }}{% endset %}
            {% set revenueText %}{{ 'General_ColumnRevenue'|translate }}{% endset %}
            <strong>{{ revenue }}</strong> {{ 'Goals_LeftInCart'|translate(revenueText) }}
\t    </div>
        {% if cart_revenue_trend is defined %}
        <div class=\"metricEvolution\" title=\"{{ cart_revenue_tooltip|raw }}\">
            {% if cart_revenue_trend == -1 %} {% set trend_icon='arrow_down' %} {% set trend_class='negative' %} {% endif %}
            {% if cart_revenue_trend == 1 %} {% set trend_icon='arrow_up' %} {% set trend_class='positive' %} {% endif %}
            {% if cart_revenue_trend == 0 %} {% set trend_icon='stop' %} {% set trend_class='neutral' %} {% endif %}
            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/{{ trend_icon }}.png\">
            <strong class=\"{{ trend_class }}-evolution\">{% if nb_conversions_trend == 1 %}{{'Intl_NumberSymbolPlus'|translate}}{% endif %}{{ cart_revenue_trend_percent|raw }}</strong>
        </div>
        {% endif %}
    </div>

    <div class=\"sparkline\">
        {{ sparkline(cart_urlSparklineConversionRate) }}
\t    <div class=\"sparkline-metrics\">
            <strong>{{ cart_conversion_rate|percent }}</strong>
            {{ 'General_VisitsWith'|translate(ecommerceAbandonedCartsText) }}
\t    </div>
        {% if cart_conversion_rate_trend is defined %}
        <div class=\"metricEvolution\" title=\"{{ cart_conversion_rate_tooltip|raw }}\">
            {% if cart_conversion_rate_trend == -1 %} {% set trend_icon='arrow_down' %} {% set trend_class='negative' %} {% endif %}
            {% if cart_conversion_rate_trend == 1 %} {% set trend_icon='arrow_up' %} {% set trend_class='positive' %} {% endif %}
            {% if cart_conversion_rate_trend == 0 %} {% set trend_icon='stop' %} {% set trend_class='neutral' %} {% endif %}
            <img style=\"padding-right:4px;padding-left:4px;margin-top:-2px\" src=\"plugins/MultiSites/images/{{ trend_icon }}.png\">
            <strong class=\"{{ trend_class }}-evolution\">{% if nb_conversions_trend == 1 %}{{'Intl_NumberSymbolPlus'|translate}}{% endif %}{{ cart_conversion_rate_trend_percent|raw }}</strong>
        </div>
        {% endif %}
    </div>

</div>
<div style=\"clear: left;\"></div>
{% include \"_sparklineFooter.twig\" %}
</div>
</div>
", "@Ecommerce/getSparklines.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/Ecommerce/templates/getSparklines.twig");
    }
}
