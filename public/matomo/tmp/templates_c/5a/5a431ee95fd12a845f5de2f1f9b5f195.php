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

/* @CoreVisualizations/_dataTableViz_tagCloud.twig */
class __TwigTemplate_a391b9d5d83d420381544e9527c465cd extends Template
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
        echo "<div class=\"tagCloud\">
";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cloudValues"]) || array_key_exists("cloudValues", $context) ? $context["cloudValues"] : (function () { throw new RuntimeError('Variable "cloudValues" does not exist.', 2, $this->source); })()));
        foreach ($context['_seq'] as $context["word"] => $context["value"]) {
            // line 3
            echo "    <span title=\"";
            echo $this->env->getFilter('rawSafeDecoded')->getCallable()(twig_get_attribute($this->env, $this->source, $context["value"], "word", [], "any", false, false, false, 3));
            echo " (";
            echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 3), "html", null, true);
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "translations", [], "any", false, true, false, 3), (isset($context["cloudColumn"]) || array_key_exists("cloudColumn", $context) ? $context["cloudColumn"] : (function () { throw new RuntimeError('Variable "cloudColumn" does not exist.', 3, $this->source); })()), [], "array", true, true, false, 3)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "translations", [], "any", false, true, false, 3), (isset($context["cloudColumn"]) || array_key_exists("cloudColumn", $context) ? $context["cloudColumn"] : (function () { throw new RuntimeError('Variable "cloudColumn" does not exist.', 3, $this->source); })()), [], "array", false, false, false, 3), (isset($context["cloudColumn"]) || array_key_exists("cloudColumn", $context) ? $context["cloudColumn"] : (function () { throw new RuntimeError('Variable "cloudColumn" does not exist.', 3, $this->source); })()))) : ((isset($context["cloudColumn"]) || array_key_exists("cloudColumn", $context) ? $context["cloudColumn"] : (function () { throw new RuntimeError('Variable "cloudColumn" does not exist.', 3, $this->source); })()))), "html", null, true);
            echo ")\" class=\"word size";
            echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "size", [], "any", false, false, false, 3), "html", null, true);
            echo "
    ";
            // line 5
            echo "    ";
            if ((twig_get_attribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 5) == 0)) {
                echo "valueIsZero";
            }
            echo "\">
    ";
            // line 6
            if ( !(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["labelMetadata"]) || array_key_exists("labelMetadata", $context) ? $context["labelMetadata"] : (function () { throw new RuntimeError('Variable "labelMetadata" does not exist.', 6, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["value"], "word", [], "any", false, false, false, 6), [], "array", false, false, false, 6), "url", [], "any", false, false, false, 6) === false)) {
                // line 7
                echo "        <a href=\"";
                echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["labelMetadata"]) || array_key_exists("labelMetadata", $context) ? $context["labelMetadata"] : (function () { throw new RuntimeError('Variable "labelMetadata" does not exist.', 7, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["value"], "word", [], "any", false, false, false, 7), [], "array", false, false, false, 7), "url", [], "any", false, false, false, 7), "html", null, true);
                echo "\" rel=\"noreferrer noopener\" target=\"_blank\">
    ";
            }
            // line 9
            echo "    ";
            if ( !(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["labelMetadata"]) || array_key_exists("labelMetadata", $context) ? $context["labelMetadata"] : (function () { throw new RuntimeError('Variable "labelMetadata" does not exist.', 9, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["value"], "word", [], "any", false, false, false, 9), [], "array", false, false, false, 9), "logo", [], "any", false, false, false, 9) === false)) {
                // line 10
                echo "        <img src=\"";
                echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["labelMetadata"]) || array_key_exists("labelMetadata", $context) ? $context["labelMetadata"] : (function () { throw new RuntimeError('Variable "labelMetadata" does not exist.', 10, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["value"], "word", [], "any", false, false, false, 10), [], "array", false, false, false, 10), "logo", [], "any", false, false, false, 10), "html", null, true);
                echo "\" width=\"";
                echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "logoWidth", [], "any", false, false, false, 10), "html", null, true);
                echo "\" />
    ";
            } else {
                // line 12
                echo "        ";
                echo $this->env->getFilter('rawSafeDecoded')->getCallable()(twig_get_attribute($this->env, $this->source, $context["value"], "wordTruncated", [], "any", false, false, false, 12));
                echo "
    ";
            }
            // line 14
            echo "    ";
            if ( !(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["labelMetadata"]) || array_key_exists("labelMetadata", $context) ? $context["labelMetadata"] : (function () { throw new RuntimeError('Variable "labelMetadata" does not exist.', 14, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["value"], "word", [], "any", false, false, false, 14), [], "array", false, false, false, 14), "url", [], "any", false, false, false, 14) === false)) {
                echo "</a>";
            }
            // line 15
            echo "    </span>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['word'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreVisualizations/_dataTableViz_tagCloud.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 17,  92 => 15,  87 => 14,  81 => 12,  73 => 10,  70 => 9,  64 => 7,  62 => 6,  55 => 5,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"tagCloud\">
{% for word,value in cloudValues %}
    <span title=\"{{ value.word|rawSafeDecoded }} ({{ value.value }} {{ properties.translations[cloudColumn]|default(cloudColumn) }})\" class=\"word size{{ value.size }}
    {# we strike tags with 0 hits #}
    {% if value.value == 0 %}valueIsZero{% endif %}\">
    {% if labelMetadata[value.word].url is not same as(false) %}
        <a href=\"{{ labelMetadata[value.word].url }}\" rel=\"noreferrer noopener\" target=\"_blank\">
    {% endif %}
    {% if labelMetadata[value.word].logo is not same as(false) %}
        <img src=\"{{ labelMetadata[value.word].logo }}\" width=\"{{ value.logoWidth }}\" />
    {% else %}
        {{ value.wordTruncated|rawSafeDecoded }}
    {% endif %}
    {% if labelMetadata[value.word].url is not same as(false) %}</a>{% endif %}
    </span>
{% endfor %}
</div>
", "@CoreVisualizations/_dataTableViz_tagCloud.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/CoreVisualizations/templates/_dataTableViz_tagCloud.twig");
    }
}
