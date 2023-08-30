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

/* @Transitions/transitions.twig */
class __TwigTemplate_9869de06b067c068334f3e8a21f7e9aa extends Template
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
        if ( !(isset($context["isWidget"]) || array_key_exists("isWidget", $context) ? $context["isWidget"] : (function () { throw new RuntimeError('Variable "isWidget" does not exist.', 1, $this->source); })())) {
            echo "<div piwik-content-block
                          help-text=\"";
            // line 2
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Transitions_FeatureDescription"), "html_attr");
            echo "\"
                          help-url=\"https://matomo.org/docs/transitions/\"
                          content-title=\"";
            // line 4
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Transitions_Transitions"), "html_attr");
            echo "\">";
        }
        // line 5
        echo "
<div
  vue-entry=\"Transitions.TransitionSwitcher\"
  is-widget=\"";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, json_encode(_twig_default_filter( ! !(isset($context["isWidget"]) || array_key_exists("isWidget", $context) ? $context["isWidget"] : (function () { throw new RuntimeError('Variable "isWidget" does not exist.', 8, $this->source); })()), null)), "html_attr");
        echo "\"
></div>

";
        // line 11
        if ( !(isset($context["isWidget"]) || array_key_exists("isWidget", $context) ? $context["isWidget"] : (function () { throw new RuntimeError('Variable "isWidget" does not exist.', 11, $this->source); })())) {
            echo "</div>";
        }
        // line 12
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Transitions/transitions.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 12,  61 => 11,  55 => 8,  50 => 5,  46 => 4,  41 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if not isWidget %}<div piwik-content-block
                          help-text=\"{{ 'Transitions_FeatureDescription'|translate|e('html_attr') }}\"
                          help-url=\"https://matomo.org/docs/transitions/\"
                          content-title=\"{{ 'Transitions_Transitions'|translate|e('html_attr') }}\">{% endif %}

<div
  vue-entry=\"Transitions.TransitionSwitcher\"
  is-widget=\"{{ (not not isWidget)|default(null)|json_encode|e('html_attr') }}\"
></div>

{% if not isWidget %}</div>{% endif %}

", "@Transitions/transitions.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/Transitions/templates/transitions.twig");
    }
}
