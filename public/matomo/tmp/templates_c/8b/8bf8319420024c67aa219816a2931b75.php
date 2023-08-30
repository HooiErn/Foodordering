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

/* @SitesManager/index.twig */
class __TwigTemplate_125e892c905ad9b11653f959473320fe extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_WebsitesManagement"), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@SitesManager/index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "
    <div matomo-sites-management></div>

";
    }

    public function getTemplateName()
    {
        return "@SitesManager/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 6,  51 => 5,  46 => 1,  42 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'admin.twig' %}

{% set title %}{{ 'SitesManager_WebsitesManagement'|translate }}{% endset %}

{% block content %}

    <div matomo-sites-management></div>

{% endblock %}
", "@SitesManager/index.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/SitesManager/templates/index.twig");
    }
}
