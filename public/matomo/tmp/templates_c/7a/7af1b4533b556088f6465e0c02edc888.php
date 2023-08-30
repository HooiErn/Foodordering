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

/* @CoreUpdater/layout.twig */
class __TwigTemplate_085c3a04355cad18eec5d0a1df63b1d9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html id=\"ng-app\" ng-app=\"piwikApp\">
<head>
    <meta charset=\"utf-8\">
    <title>Matomo &rsaquo; ";
        // line 5
        echo \Piwik\piwik_escape_filter($this->env, ((array_key_exists("pageTitle", $context)) ? (_twig_default_filter((isset($context["pageTitle"]) || array_key_exists("pageTitle", $context) ? $context["pageTitle"] : (function () { throw new RuntimeError('Variable "pageTitle" does not exist.', 5, $this->source); })()), $this->env->getFilter('translate')->getCallable()("CoreUpdater_UpdateTitle"))) : ($this->env->getFilter('translate')->getCallable()("CoreUpdater_UpdateTitle"))), "html", null, true);
        echo "</title>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EDGE,chrome=1\"/>
    <meta name=\"viewport\" content=\"initial-scale=1.0\" />
    <meta name=\"robots\" content=\"noindex,nofollow\">
    <meta name=\"google\" content=\"notranslate\">

    <script>window.piwik = {};</script>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"index.php?module=CoreUpdater&action=getUpdaterCss\"/>
    <script type=\"text/javascript\" src=\"index.php?module=CoreUpdater&action=getUpdaterJs\"></script>

    <script type=\"text/javascript\">";
        // line 15
        echo $this->env->getFunction('getJavascriptTranslations')->getCallable()();
        echo "</script>

    ";
        // line 17
        $this->loadTemplate("@CoreHome/_favicon.twig", "@CoreUpdater/layout.twig", 17)->display($context);
        // line 18
        echo "    ";
        $this->loadTemplate("@CoreHome/_applePinnedTabIcon.twig", "@CoreUpdater/layout.twig", 18)->display($context);
        // line 19
        echo "</head>
<body id=\"simple\" ng-app=\"app\">

";
        // line 22
        $this->loadTemplate("@CoreHome/_logo.twig", "@CoreUpdater/layout.twig", 22)->display(twig_array_merge($context, ["logoLink" => false]));
        // line 23
        echo "
<div class=\"box\">
    ";
        // line 25
        $this->displayBlock('content', $context, $blocks);
        // line 27
        echo "</div>

</body>
</html>
";
    }

    // line 25
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@CoreUpdater/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 26,  88 => 25,  80 => 27,  78 => 25,  74 => 23,  72 => 22,  67 => 19,  64 => 18,  62 => 17,  57 => 15,  44 => 5,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html id=\"ng-app\" ng-app=\"piwikApp\">
<head>
    <meta charset=\"utf-8\">
    <title>Matomo &rsaquo; {{ pageTitle|default('CoreUpdater_UpdateTitle'|translate) }}</title>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EDGE,chrome=1\"/>
    <meta name=\"viewport\" content=\"initial-scale=1.0\" />
    <meta name=\"robots\" content=\"noindex,nofollow\">
    <meta name=\"google\" content=\"notranslate\">

    <script>window.piwik = {};</script>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"index.php?module=CoreUpdater&action=getUpdaterCss\"/>
    <script type=\"text/javascript\" src=\"index.php?module=CoreUpdater&action=getUpdaterJs\"></script>

    <script type=\"text/javascript\">{{ getJavascriptTranslations()|raw }}</script>

    {% include \"@CoreHome/_favicon.twig\" %}
    {% include \"@CoreHome/_applePinnedTabIcon.twig\" %}
</head>
<body id=\"simple\" ng-app=\"app\">

{% include \"@CoreHome/_logo.twig\" with { 'logoLink': false } %}

<div class=\"box\">
    {% block content %}
    {% endblock %}
</div>

</body>
</html>
", "@CoreUpdater/layout.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/CoreUpdater/templates/layout.twig");
    }
}
