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

/* @CoreHome/widgetContainer.twig */
class __TwigTemplate_4f44ac96a6f24e675e7c76ac5c9097b8 extends Template
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
        echo "<div>
    <div piwik-widget
         containerid=\"";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["containerId"]) || array_key_exists("containerId", $context) ? $context["containerId"] : (function () { throw new RuntimeError('Variable "containerId" does not exist.', 3, $this->source); })()), "html_attr");
        echo "\"
         widgetized=\"";
        // line 4
        if ((isset($context["isWidgetized"]) || array_key_exists("isWidgetized", $context) ? $context["isWidgetized"] : (function () { throw new RuntimeError('Variable "isWidgetized" does not exist.', 4, $this->source); })())) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\"></div>

    <script type=\"text/javascript\">
        \$(function () {

            var piwikWidget = \$('[piwik-widget][containerid=";
        // line 9
        echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, (isset($context["containerId"]) || array_key_exists("containerId", $context) ? $context["containerId"] : (function () { throw new RuntimeError('Variable "containerId" does not exist.', 9, $this->source); })()), "js"), "html", null, true);
        echo "]');
            var isExportedAsWidget = \$('body > .widget').length;

            if (!isExportedAsWidget) {
                angular.element(document).injector().invoke(function(\$compile) {
                    var scope = angular.element(piwikWidget).scope();
                    \$compile(piwikWidget)(scope.\$new());
                });
            }

        });
    </script>
</div>";
    }

    public function getTemplateName()
    {
        return "@CoreHome/widgetContainer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 9,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div>
    <div piwik-widget
         containerid=\"{{ containerId|e('html_attr') }}\"
         widgetized=\"{% if isWidgetized %}true{% else %}false{% endif %}\"></div>

    <script type=\"text/javascript\">
        \$(function () {

            var piwikWidget = \$('[piwik-widget][containerid={{ containerId|e('js') }}]');
            var isExportedAsWidget = \$('body > .widget').length;

            if (!isExportedAsWidget) {
                angular.element(document).injector().invoke(function(\$compile) {
                    var scope = angular.element(piwikWidget).scope();
                    \$compile(piwikWidget)(scope.\$new());
                });
            }

        });
    </script>
</div>", "@CoreHome/widgetContainer.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/CoreHome/templates/widgetContainer.twig");
    }
}
