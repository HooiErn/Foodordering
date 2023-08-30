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

/* @CoreHome/_angularComponent.twig */
class __TwigTemplate_01bc2f255049b5bd00b98ab233b77875 extends Template
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
        echo "<";
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["componentName"]) || array_key_exists("componentName", $context) ? $context["componentName"] : (function () { throw new RuntimeError('Variable "componentName" does not exist.', 1, $this->source); })()), "html");
        echo "
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["componentParameters"]) || array_key_exists("componentParameters", $context) ? $context["componentParameters"] : (function () { throw new RuntimeError('Variable "componentParameters" does not exist.', 2, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 3
            echo "    ";
            echo \Piwik\piwik_escape_filter($this->env, $context["key"], "html");
            echo "=\"";
            echo \Piwik\piwik_escape_filter($this->env, $context["value"], "html_attr");
            echo "\"
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "/>";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_angularComponent.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 5,  46 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<{{ componentName|e('html') }}
    {% for key, value in componentParameters %}
    {{ key|e('html') }}=\"{{ value|e('html_attr') }}\"
    {% endfor %}
/>", "@CoreHome/_angularComponent.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/CoreHome/templates/_angularComponent.twig");
    }
}
